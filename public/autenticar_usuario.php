<?php

session_set_cookie_params(2592000);
session_start();

require_once '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit();
}

$login = trim($_POST['login_identificador'] ?? '');
$senha = $_POST['senha_usuario'] ?? '';

if ($login === '' || $senha === '') {
    $_SESSION['login_erro'] = 'Preencha todos os campos.';
    header('Location: login.php');
    exit();
}

$sql = "SELECT id, nome_usuario, email_usuario, senha_usuario, cargo
        FROM usuario
        WHERE email_usuario = ? OR nome_usuario = ?
        ORDER BY (email_usuario = ?) DESC, id ASC
        LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    $_SESSION['login_erro'] = 'Erro ao consultar o banco de dados.';
    header('Location: login.php');
    exit();
}

$stmt->bind_param('sss', $login, $login, $login);
$stmt->execute();

$resultado = $stmt->get_result();
$usuario = $resultado->fetch_assoc();

$stmt->close();

$senha_valida = false;

if ($usuario) {
    $senha_db = $usuario['senha_usuario'];

    // 1. Tenta validar via Bcrypt (novo formato)
    if (password_verify($senha, $senha_db)) {
        $senha_valida = true;
    } 
    // 2. Se falhar, tenta validar a senha original/antiga (texto puro)
    elseif ($senha === $senha_db) {
        $senha_valida = true;

        // Migração automática: gera o hash Bcrypt e atualiza no banco
        $novo_hash = password_hash($senha, PASSWORD_BCRYPT);
        $update_stmt = $conn->prepare("UPDATE usuario SET senha_usuario = ? WHERE id = ?");
        if ($update_stmt) {
            $update_stmt->bind_param('si', $novo_hash, $usuario['id']);
            $update_stmt->execute();
            $update_stmt->close();
        }
    }
}

if (!$usuario || !$senha_valida) {
    $_SESSION['login_erro'] = 'Usuário/e-mail ou senha incorretos.';
    header('Location: login.php');
    exit();
}

if (!in_array($usuario['cargo'], ['adm', 'usuario'], true)) {
    $_SESSION['login_erro'] = 'Cargo de usuário inválido.';
    header('Location: login.php');
    exit();
}

session_regenerate_id(true);
$_SESSION = [];

$_SESSION['usuario_id'] = (int) $usuario['id'];
$_SESSION['usuario_nome'] = $usuario['nome_usuario'];
$_SESSION['usuario'] = $usuario['nome_usuario'];
$_SESSION['cargo'] = $usuario['cargo'];

if ($usuario['cargo'] === 'adm') {
    header('Location: tela_inicial_adm.php');
} else {
    header('Location: tela_usuario.php');
}

exit();

?>