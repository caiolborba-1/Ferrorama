
<?php

ob_start();

header('Content-Type: application/json; charset=utf-8');

session_start();

function responder($status, $dados)
{
    while (ob_get_level() > 0) {
        ob_end_clean();
    }

    http_response_code($status);

    echo json_encode(
        $dados,
        JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
    );

    exit;
}

try {

    if (
        !isset($_SESSION['usuario_id']) ||
        !isset($_SESSION['cargo']) ||
        !in_array($_SESSION['cargo'], ['usuario', 'adm'], true)
    ) {
        responder(403, [
            'erro' => 'Acesso não autorizado.'
        ]);
    }

    require_once __DIR__ . '/../infra/config_clima.php';
    require_once __DIR__ . '/../infra/conexao.php';

    if (!defined('WEATHER_API_KEY') || empty(trim(WEATHER_API_KEY))) {
        responder(500, [
            'erro' => 'A chave da API de clima não está configurada.'
        ]);
    }

    $id_usuario = (int) $_SESSION['usuario_id'];

    $stmt = $conn->prepare(
        "SELECT cidade_usuario, uf_usuario FROM usuario WHERE id = ?"
    );

    if (!$stmt) {
        responder(500, [
            'erro' => 'Erro ao consultar os dados do usuário.'
        ]);
    }

    $stmt->bind_param('i', $id_usuario);
    $stmt->execute();

    $stmt->bind_result($cidade, $uf);

    $encontrado = $stmt->fetch();

    $stmt->close();

    if (
        !$encontrado ||
        empty(trim($cidade ?? '')) ||
        empty(trim($uf ?? ''))
    ) {
        responder(400, [
            'erro' => 'Cadastre sua cidade e seu estado no perfil.'
        ]);
    }

    $cidade = trim($cidade);
    $uf = strtoupper(trim($uf));

    $localizacao = $cidade . ', ' . $uf;

    $url = 'https://api.weatherapi.com/v1/current.json?' .
        http_build_query([
            'key' => trim(WEATHER_API_KEY),
            'q' => $localizacao,
            'lang' => 'pt'
        ]);

    $contexto = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 15,
            'ignore_errors' => true
        ],
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true
        ]
    ]);

    $resposta = @file_get_contents($url, false, $contexto);

    if ($resposta === false) {
        responder(502, [
            'erro' => 'Não foi possível conectar à WeatherAPI. Verifique a conexão e a configuração allow_url_fopen.'
        ]);
    }

    $status = 0;

    if (isset($http_response_header[0])) {
        preg_match('/\s(\d{3})\s/', $http_response_header[0], $matches);
        $status = isset($matches[1]) ? (int) $matches[1] : 0;
    }

    $dados = json_decode($resposta, true);

    if (
        $status !== 200 ||
        !is_array($dados) ||
        !isset($dados['current'], $dados['location'])
    ) {
        responder(502, [
            'erro' => $dados['error']['message'] ??
                'Não foi possível obter os dados do clima.'
        ]);
    }

    responder(200, [
        'cidade' => $dados['location']['name'],
        'estado' => $uf,
        'temperatura' => $dados['current']['temp_c'],
        'sensacao' => $dados['current']['feelslike_c'],
        'umidade' => $dados['current']['humidity'],
        'condicao' => $dados['current']['condition']['text'],
        'icone' => $dados['current']['condition']['icon'],
        'atualizacao' => $dados['current']['last_updated']
    ]);

} catch (Throwable $erro) {

    responder(500, [
        'erro' => 'Erro interno no clima.php: ' . $erro->getMessage()
    ]);

}
