
<?php

ob_start();

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Pragma: no-cache');

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

    // Verifica o usuário conectado
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

    // Verifica a chave
    if (
        !defined('WEATHER_API_KEY') ||
        trim(WEATHER_API_KEY) === '' ||
        WEATHER_API_KEY === 'COLOQUE_SUA_CHAVE_NOVA_AQUI'
    ) {
        responder(500, [
            'erro' => 'Configure corretamente a chave da WeatherAPI.'
        ]);
    }

    // Busca a cidade do usuário conectado
    $id_usuario = (int) $_SESSION['usuario_id'];

    $stmt = $conn->prepare(
        "SELECT cidade_usuario, uf_usuario
         FROM usuario
         WHERE id = ?"
    );

    if (!$stmt) {
        responder(500, [
            'erro' => 'Erro ao preparar consulta do usuário.'
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

    // Monta a localização
    $localizacao = $cidade . ', ' . $uf . ', Brazil';

    // Monta a URL da WeatherAPI
    $url = 'https://api.weatherapi.com/v1/current.json?' .
        http_build_query([
            'key' => trim(WEATHER_API_KEY),
            'q' => $localizacao,
            'lang' => 'pt',
            'aqi' => 'no'
        ]);

    // Configuração da conexão
    $contexto = stream_context_create([
        'http' => [
            'method' => 'GET',
            'timeout' => 15,
            'ignore_errors' => true,
            'header' => "Accept: application/json\r\n"
        ],
        'ssl' => [
            'verify_peer' => true,
            'verify_peer_name' => true
        ]
    ]);

    $resposta = @file_get_contents($url, false, $contexto);

    if ($resposta === false) {
        responder(502, [
            'erro' => 'Não foi possível conectar à WeatherAPI. Verifique a conexão do servidor.'
        ]);
    }

    // Identifica o código HTTP
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
        $mensagem = $dados['error']['message'] ??
            'Não foi possível obter os dados meteorológicos.';

        responder(502, [
            'erro' => $mensagem
        ]);
    }

    // Retorna somente os dados necessários
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

    error_log('Erro no clima.php: ' . $erro->getMessage());

    responder(500, [
        'erro' => 'Ocorreu um erro interno ao consultar o clima.'
    ]);
}
