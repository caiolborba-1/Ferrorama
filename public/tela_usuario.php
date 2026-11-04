
<?php

header('Content-Type: application/json; charset=utf-8');

session_start();

if (
    !isset($_SESSION['usuario_id']) ||
    !isset($_SESSION['cargo']) ||
    $_SESSION['cargo'] !== 'usuario'
) {
    http_response_code(403);

    echo json_encode([
        'erro' => 'Acesso não autorizado.'
    ]);

    exit;
}

require_once __DIR__ . '/../infra/config_clima.php';
require_once __DIR__ . '/../infra/conexao.php';

$id_usuario = (int) $_SESSION['usuario_id'];

// Busca a cidade e o estado cadastrados no perfil
$stmt = $conn->prepare(
    "SELECT cidade_usuario, uf_usuario FROM usuario WHERE id = ?"
);

$stmt->bind_param("i", $id_usuario);
$stmt->execute();

$usuario = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (
    !$usuario ||
    empty($usuario['cidade_usuario']) ||
    empty($usuario['uf_usuario'])
) {
    http_response_code(400);

    echo json_encode([
        'erro' => 'Cadastre sua cidade e seu estado no perfil.'
    ]);

    exit;
}

$cidade = trim($usuario['cidade_usuario']);
$uf = trim($usuario['uf_usuario']);

$localizacao = $cidade . ', ' . $uf . ', Brasil';

$url = 'https://api.weatherapi.com/v1/current.json?' . http_build_query([
    'key' => WEATHER_API_KEY,
    'q' => $localizacao,
    'lang' => 'pt'
]);

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 15,
    CURLOPT_SSL_VERIFYPEER => true
]);

$resposta = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($resposta === false) {
    http_response_code(502);

    echo json_encode([
        'erro' => 'Não foi possível consultar o serviço de clima.'
    ]);

    exit;
}

$dados = json_decode($resposta, true);

if ($status !== 200 || !isset($dados['current'])) {
    http_response_code(502);

    echo json_encode([
        'erro' => $dados['error']['message'] ?? 'Erro ao buscar informações do clima.'
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

echo json_encode([
    'cidade' => $dados['location']['name'],
    'estado' => $uf,
    'temperatura' => $dados['current']['temp_c'],
    'sensacao' => $dados['current']['feelslike_c'],
    'umidade' => $dados['current']['humidity'],
    'condicao' => $dados['current']['condition']['text'],
    'icone' => $dados['current']['condition']['icon'],
    'atualizacao' => $dados['current']['last_updated']
], JSON_UNESCAPED_UNICODE);
