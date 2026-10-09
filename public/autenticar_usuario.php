<?php
session_set_cookie_params(2592000);
session_start();
require_once '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login_identificador = trim($_POST['login_identificador'] ?? '');
    $senha_usuario       = $_POST['senha_usuario'] ?? '';

    if (empty($login_identificador) || empty($senha_usuario)) {
        $_SESSION['login_erro'] = "Preencha todos os campos.";
        header("Location: login_usuario.php");
        exit;
    }

    $sql = "SELECT id, nome_usuario, senha_usuario, cargo 
            FROM usuario
            WHERE email_usuario = ? OR nome_usuario = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $login_identificador, $login_identificador);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($usuario && password_verify($senha_usuario, $usuario['senha_usuario'])) {
        session_regenerate_id(true);

        $_SESSION['usuario_id']   = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome_usuario'];
        $_SESSION['usuario']      = $usuario['nome_usuario'];
        $_SESSION['cargo']        = $usuario['cargo'];

        if ($_SESSION['cargo'] === 'adm') {
            header("Location: tela_inicial_adm.php");
        } else {
            header("Location: tela_inicial.php");
        }
        exit;
    } else {
        $_SESSION['login_erro'] = "Usuário/E-mail ou senha incorretos.";
        header("Location: login_usuario.php");
        exit;
    }
} else {
    header("Location: login_usuario.php");
    exit;
}