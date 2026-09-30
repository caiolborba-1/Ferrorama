<?php
session_start();
require_once '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_usuario  = trim($_POST['nome_usuario'] ?? '');
    $email_usuario = trim($_POST['email_usuario'] ?? '');
    $senha_usuario = $_POST["senha_usuario"] ?? '';

    if ((empty($nome_usuario) && empty($email_usuario)) || empty($senha_usuario)) {
        die("Preencha o e-mail (ou nome de usuário) e a senha.");
    }

    $sql = "SELECT id, nome_usuario, senha_usuario 
            FROM usuario
            WHERE email_usuario = ? OR nome_usuario = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email_usuario, $nome_usuario);
    $stmt->execute();

    $resultado = $stmt->get_result();
    $usuario = $resultado->fetch_assoc();

    if ($usuario && $senha_usuario === $usuario['senha_usuario']) {
        session_regenerate_id(true);

        $_SESSION['usuario_id']   = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome_usuario'];

        header("Location: tela_inicial.php");
        exit;
    } else {
        echo "Usuário/E-mail ou senha incorretos.";
    }
}