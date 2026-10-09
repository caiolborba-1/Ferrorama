<?php
session_set_cookie_params(2592000);
session_start();

$erro = $_SESSION['login_erro'] ?? '';
$sucesso = $_SESSION['sucesso_cadastro'] ?? '';

unset($_SESSION['login_erro'], $_SESSION['sucesso_cadastro']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body class="A margin">

    <div class="text-center mt-3">
        <img src="../assets/img/Logo Atual.png" alt="Logo" class="">
    </div>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div id="a" class="card shadow p-4" style="width: 100%; max-width: 400px;">

            <h3 class="text-center mb-4" id="titulo">Login</h3>

            <?php if (!empty($sucesso)): ?>
                <div class="alert alert-success text-center mb-3">
                    <?php echo htmlspecialchars($sucesso); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($erro)): ?>
                <div class="alert alert-danger text-center mb-3">
                    <?php echo htmlspecialchars($erro); ?>
                </div>
            <?php endif; ?>

            <form id="form-login" action="autenticar_usuario.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">Usuário ou E-mail</label>
                    <input type="text" id="login_identificador" name="login_identificador" class="form-control" placeholder="Digite seu e-mail ou nome de usuário" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" id="senha_usuario" name="senha_usuario" class="form-control" placeholder="Digite sua senha" required>
                </div>

                <button id="button" type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <div class="text-center mt-3">
                <a href="../index.php">Não tem conta? Cadastre-se!</a>
            </div>

        </div>
    </div>

    <script src="../scripts/relogio_navbar.js"></script>
    <script src="../scripts/links_paginas.js"></script>
</body>
</html>