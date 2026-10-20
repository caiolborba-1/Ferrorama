
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

$stmt = $conn->prepare("DELETE FROM rotas WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute() && $stmt->affected_rows > 0) {
    $stmt->close();
    header("Location: visualizar_rotas.php?mensagem=excluida");
    exit;
}

$stmt->close();

header("Location: visualizar_rotas.php?erro=excluir");
exit;
?>
