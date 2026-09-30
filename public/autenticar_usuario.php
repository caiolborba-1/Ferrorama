<?php
session_start();
require_once '../infra/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_usuario  = trim($_POST['nome_usuario'] ?? '');
    $email_usuario = trim($_POST['email_usuario'] ?? '');
    $senha_usuario = trim($_POST['senha_usuario'] ?? '');

    if ((empty($nome_usuario) && empty($email_usuario)) || empty($senha_usuario)) {
        die("Preencha o e-mail (ou nome de usuário) e a senha.");
    }

    $sql = "SELECT id, nome_usuario, senha_usuario 
            FROM usuarios 
            WHERE email_usuario = :email_usuario OR nome_usuario = :nome_usuario";
            
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email_usuario', $email_usuario);
    $stmt->bindValue(':nome_usuario', $nome_usuario);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha_usuario, $usuario['senha_usuario'])) {
        session_regenerate_id(true);

        $_SESSION['usuario_id']   = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome_usuario'];

        header("Location: public/tela_inicial.php");
        exit;
    } else {
        echo "Usuário/E-mail ou senha incorretos.";
    }
}