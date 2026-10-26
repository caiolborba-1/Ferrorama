
<?php

require_once '../infra/conexao.php';

<<<<<<< HEAD

=======
>>>>>>> 0c3e5ae593279b37a44bb94f2195a9fde44c173d
$id = (int)$_POST["id"];
$nome_usuario = $_POST["nome_usuario"];
$email_usuario = $_POST["email_usuario"];
$senha_usuario = $_POST["senha_usuario"];
$cargo = $_POST["cargo"];

if (str_starts_with($senha_usuario, '$2y$')) {
    $sql = "UPDATE usuario SET nome_usuario = ?, email_usuario = ?, cargo = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sssi", $nome_usuario, $email_usuario, $cargo, $id);
} else {
    $senha_com_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);
    $sql = "UPDATE usuario SET nome_usuario = ?, email_usuario = ?, senha_usuario = ?, cargo = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $nome_usuario, $email_usuario, $senha_com_hash, $cargo, $id);
}

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: visualizar_cadastro.php");
exit;
<<<<<<< HEAD

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
>>>>>>> 59a49919b9ab74e3795d4629b65abedc626aabee
=======
>>>>>>> 0c3e5ae593279b37a44bb94f2195a9fde44c173d
