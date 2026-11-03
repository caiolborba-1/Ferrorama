
<?php

session_start();

header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/../infra/conexao.php';
require_once __DIR__ . '/../infra/config_clima.php';

if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo json_encode(['erro' => 'Você precisa estar conectado.']);
    exit;
}

if (
    !defined('WEATHER_API_KEY') ||
    WEATHER_API_KEY === 'COLOQUE_SUA_NOVA_CHAVE_AQUI'
) {
    http_response_code(500);
    echo json_encode(['erro' => 'Configure a chave da WeatherAPI.']);
    exit;
}

$stmt = $conn->prepare(
    "SELECT cidade_usuario, uf_usuario
     FROM usuario
     WHERE id = ?"
);

if (!$stmt) {
    http_response_code(500);
    echo json_encode(['erro' => 'Erro ao consultar o cadastro.']);
    exit;
}

$stmt->bind_param("i", $_SESSION['usuario_id']);
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
        'erro' => 'Cadastre sua cidade e seu estado no perfil para consultar o clima.'
    ]);
    exit;
}

$cidade = trim($usuario['cidade_usuario']);
$uf = trim($usuario['uf_usuario']);

$localizacao = $cidade . ', ' . $uf . ', Brazil';

$url = 'https://api.weatherapi.com/v1/forecast.json?' . http_build_query([
    'key' => WEATHER_API_KEY,
    'q' => $localizacao,
    'days' => 2,
    'aqi' => 'no',
    'alerts' => 'no'
]);

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 20,
    CURLOPT_SSL_VERIFYPEER => true
]);

$resposta = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

curl_close($curl);

if ($resposta === false || $status !== 200) {
    http_response_code(502);

    echo json_encode([
        'erro' => 'Não foi possível consultar a WeatherAPI. Verifique a chave e a cidade cadastrada.'
    ]);

    exit;
}

echo $resposta;
