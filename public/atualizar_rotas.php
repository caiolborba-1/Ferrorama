
<?php
include('../infra/conexao.php');

if (
    $_SERVER['REQUEST_METHOD'] !== 'POST' ||
    !isset($_POST['id']) ||
    !ctype_digit($_POST['id'])
) {
    header("Location: visualizar_rotas.php");
    exit;
}

$id = (int)$_POST['id'];
$nome_rota = trim($_POST['nome_rota'] ?? '');
$descricao_rota = trim($_POST['descricao_rota'] ?? '');
$distancia_rota = $_POST['distancia_rota'] ?? '';
$id_trens = $_POST['id_trens'] ?? '';
$duracao_rota = $_POST['duracao_rota'] ?? '';
$data_criacao = $_POST['data_criacao'] ?? '';

if (
    $nome_rota === '' ||
    $descricao_rota === '' ||
    strlen($descricao_rota) > 100 ||
    !is_numeric($distancia_rota) ||
    (float)$distancia_rota <= 0 ||
    !ctype_digit((string)$id_trens) ||
    (int)$id_trens < 1 ||
    !is_numeric($duracao_rota) ||
    (float)$duracao_rota <= 0 ||
    !preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $data_criacao)
) {
    exit("Preencha todos os campos corretamente.");
}

$id_trens = (int)$id_trens;

$verificar_trem = $conn->prepare("SELECT id FROM trens WHERE id = ?");
$verificar_trem->bind_param("i", $id_trens);
$verificar_trem->execute();

if ($verificar_trem->get_result()->num_rows === 0) {
    exit("O trem selecionado não está cadastrado.");
}
$verificar_trem->close();

$verificar_nome = $conn->prepare(
    "SELECT id FROM rotas WHERE nome_rota = ? AND id <> ?"
);
$verificar_nome->bind_param("si", $nome_rota, $id);
$verificar_nome->execute();

if ($verificar_nome->get_result()->num_rows > 0) {
    exit("Já existe outra rota com esse nome.");
}
$verificar_nome->close();

$data_formatada = str_replace('T', ' ', $data_criacao) . ':00';
$distancia = (float)$distancia_rota;
$duracao = (float)$duracao_rota;
$trem_rota = (string)$id_trens;

$sql = "UPDATE rotas
        SET nome_rota = ?,
            descricao_rota = ?,
            distancia_rota = ?,
            trem_rota = ?,
            duracao_rota = ?,
            data_criacao = ?,
            id_trens = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssdsdsii",
    $nome_rota,
    $descricao_rota,
    $distancia,
    $trem_rota,
    $duracao,
    $data_formatada,
    $id_trens,
    $id
);

if ($stmt->execute()) {
    header("Location: visualizar_rotas.php");
    exit;
}

echo "Erro ao atualizar a rota.";
?>
