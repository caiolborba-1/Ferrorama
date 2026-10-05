<?php
?>
<html lang="en">


    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/styles/styles.css">
        <title>Tela inicial</title>
    </head>
    <body class="display_flex align-items-center A">

        <div class="">
            <img src="assets/img/Logo Atual.png" alt="" class="">
        </div>
        
        <div class="display_flex" style="background-color: white;padding: 20px; border-radius: 8px; width: 100%; max-width: 400px;">

            <h3 class="" id="">Login</h3>

            <form id="" action="autenticar_usuario.php" method="POST">

                <div class="">
                    <label class="form-label">Nome de Usuário</label>
                    <input type="text" id="nome_usuario" name="nome_usuario" class="form-control" placeholder="Digite seu nome">
                </div>

                <div class="mb-3">
                    <label class="form-label">E-mail</label>
                    <input type="email" id="email_usuario" name="email_usuario" class="form-control" placeholder="Digite seu e-mail" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" id="senha_usuario" name="senha_usuario" class="form-control" placeholder="Digite sua senha" required>
                </div>

                <button id="button" type="submit" class="btn btn-primary w-100">Entrar</button>
            </form>

            <div id="mensagem" class="text-center mt-3"></div>

            <div class=""><a href="cadastro_usuario.php">Não tem conta? Cadastre-se!</a></div>

        </div>

       <script src="scripts/links_paginas.js"></script>

    </body>
</html>