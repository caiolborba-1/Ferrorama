
<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: visualizar_cadastro.php");
    exit;
}

if (
    !isset($_POST['id'], $_POST['nome_usuario'], $_POST['email_usuario'], $_POST['cargo']) ||
    !ctype_digit((string) $_POST['id'])
) {
    header("Location: visualizar_cadastro.php");
    exit;
}

$id = (int) $_POST['id'];
$nome_usuario = trim($_POST['nome_usuario']);
$email_usuario = trim($_POST['email_usuario']);
$senha_usuario = $_POST['senha_usuario'] ?? '';
$cargo = $_POST['cargo'];

if (
    $nome_usuario === '' ||
    !filter_var($email_usuario, FILTER_VALIDATE_EMAIL) ||
    !in_array($cargo, ['usuario', 'adm'], true)
) {
    exit("Dados inválidos. Verifique o nome, o e-mail e o cargo.");
}

if ($senha_usuario !== '') {
    $senha_com_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "UPDATE usuario
         SET nome_usuario = ?, email_usuario = ?, senha_usuario = ?, cargo = ?
         WHERE id = ?"
    );

    $stmt->bind_param(
        "ssssi",
        $nome_usuario,
        $email_usuario,
        $senha_com_hash,
        $cargo,
        $id
    );
} else {
    $stmt = $conn->prepare(
        "UPDATE usuario
         SET nome_usuario = ?, email_usuario = ?, cargo = ?
         WHERE id = ?"
    );

    $stmt->bind_param(
        "sssi",
        $nome_usuario,
        $email_usuario,
        $cargo,
        $id
    );
}

if ($stmt->execute()) {
    $stmt->close();

    header("Location: visualizar_cadastro.php?mensagem=atualizado");
    exit;
}

if ($stmt->errno === 1062) {
    $stmt->close();
    exit("Este nome de usuário ou e-mail já está cadastrado.");
}

$stmt->close();

exit("Não foi possível atualizar o usuário.");
?>
