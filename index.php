<?php
session_start();
include 'infra/conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome_usuario  = trim($_POST["nome_usuario"] ?? '');
    $email_usuario = trim($_POST["email_usuario"] ?? '');
    $senha_usuario = $_POST["senha_usuario"] ?? '';

    if (!empty($nome_usuario) && !empty($email_usuario) && !empty($senha_usuario)) {

        $verificar = $conn->prepare("SELECT id FROM usuario WHERE email_usuario = ?");
        $verificar->bind_param("s", $email_usuario);
        $verificar->execute();
        $resultado = $verificar->get_result();

        if ($resultado->num_rows > 0) {
            $mensagem = "Este e-mail já está cadastrado!";
        } else {
            $senha_hash = password_hash($senha_usuario, PASSWORD_DEFAULT);

            $sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nome_usuario, $email_usuario, $senha_hash);

            if ($stmt->execute()) {
                $_SESSION['sucesso_cadastro'] = "Cadastro realizado com sucesso! Faça seu login.";
                header("Location: public/login_usuario.php");
                exit();
            } else {
                $mensagem = "Erro ao cadastrar usuário.";
            }
        }

    } else {
        $mensagem = "Por favor, preencha todos os campos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">
    <title>Cadastro</title>
</head>
<body class="A margin">

    <div class="text-center mt-3">
        <img src="assets/img/Logo Atual.png" alt="Logo" class="">
    </div>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div id="a" class="card shadow p-4" style="width: 100%; max-width: 400px;">

            <h3 class="text-center mb-4" id="titulo">Cadastro</h3>

            <form id="form-cadastro" action="" method="POST">

                <div class="mb-3">
                    <label class="form-label">Nome de Usuário</label>
                    <input type="text" id="nome_usuario" name="nome_usuario" class="form-control" placeholder="Digite seu nome" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" id="email_usuario" name="email_usuario" class="form-control" placeholder="Digite seu e-mail" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" id="senha_usuario" name="senha_usuario" class="form-control" placeholder="Digite sua senha" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>

            <?php if (!empty($mensagem)): ?>
                <div id="mensagem" class="alert alert-danger text-center mt-3">
                    <?php echo htmlspecialchars($mensagem); ?>
                </div>
            <?php endif; ?>

            <div class="text-center mt-3">
                <a href="public/login_usuario.php">Já tem conta? Entre!</a>
            </div>

        </div>
    </div>

    <script src="scripts/links_paginas.js"></script>
</body>
</html>