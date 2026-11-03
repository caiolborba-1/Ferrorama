<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: visualizar_cadastro.php");
    exit;
}

if (
    !isset(
        $_POST['id'],
        $_POST['nome_usuario'],
        $_POST['email_usuario'],
        $_POST['cargo']
    ) ||
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

$cep_usuario = preg_replace('/\D/', '', $_POST['cep_usuario'] ?? '');
$logradouro_usuario = trim($_POST['logradouro_usuario'] ?? '');
$bairro_usuario = trim($_POST['bairro_usuario'] ?? '');
$cidade_usuario = trim($_POST['cidade_usuario'] ?? '');
$uf_usuario = strtoupper(trim($_POST['uf_usuario'] ?? ''));

if (
    $nome_usuario === '' ||
    !filter_var($email_usuario, FILTER_VALIDATE_EMAIL) ||
    !in_array($cargo, ['usuario', 'adm'], true)
) {
    exit("Dados inválidos. Verifique o nome, o e-mail e o cargo.");
}

if ($cep_usuario !== '' && !preg_match('/^\d{8}$/', $cep_usuario)) {
    exit("Informe um CEP válido.");
}

if ($cep_usuario !== '' && (
    $logradouro_usuario === '' ||
    $bairro_usuario === '' ||
    $cidade_usuario === '' ||
    !preg_match('/^[A-Z]{2}$/', $uf_usuario)
)) {
    exit("Verifique os dados do endereço.");
}

if ($cep_usuario === '') {
    $cep_usuario = '';
    $logradouro_usuario = '';
    $bairro_usuario = '';
    $cidade_usuario = '';
    $uf_usuario = '';
}

$verificar = $conn->prepare(
    "SELECT id FROM usuario WHERE email_usuario = ? AND id <> ?"
);

$verificar->bind_param("si", $email_usuario, $id);
$verificar->execute();

if ($verificar->get_result()->num_rows > 0) {
    $verificar->close();
    exit("Este e-mail já está cadastrado.");
}

$verificar->close();

$verificarUsuario = $conn->prepare("SELECT id FROM usuario WHERE id = ?");
$verificarUsuario->bind_param("i", $id);
$verificarUsuario->execute();

if ($verificarUsuario->get_result()->num_rows === 0) {
    $verificarUsuario->close();
    header("Location: visualizar_cadastro.php");
    exit;
}

$verificarUsuario->close();

if ($senha_usuario !== '') {
    $senha_com_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "UPDATE usuario
         SET nome_usuario = ?,
             email_usuario = ?,
             senha_usuario = ?,
             cargo = ?,
             cep_usuario = ?,
             logradouro_usuario = ?,
             bairro_usuario = ?,
             cidade_usuario = ?,
             uf_usuario = ?
         WHERE id = ?"
    );

    $stmt->bind_param(
        "sssssssssi",
        $nome_usuario,
        $email_usuario,
        $senha_com_hash,
        $cargo,
        $cep_usuario,
        $logradouro_usuario,
        $bairro_usuario,
        $cidade_usuario,
        $uf_usuario,
        $id
    );

} else {
    $stmt = $conn->prepare(
        "UPDATE usuario
         SET nome_usuario = ?,
             email_usuario = ?,
             cargo = ?,
             cep_usuario = ?,
             logradouro_usuario = ?,
             bairro_usuario = ?,
             cidade_usuario = ?,
             uf_usuario = ?
         WHERE id = ?"
    );

    $stmt->bind_param(
        "ssssssssi",
        $nome_usuario,
        $email_usuario,
        $cargo,
        $cep_usuario,
        $logradouro_usuario,
        $bairro_usuario,
        $cidade_usuario,
        $uf_usuario,
        $id
    );
}

if (!$stmt) {
    exit("Não foi possível preparar a atualização.");
}

if ($stmt->execute()) {
    $stmt->close();

    header("Location: visualizar_cadastro.php?mensagem=atualizado");
    exit;
}

$stmt->close();

exit("Não foi possível atualizar o usuário.");
?>