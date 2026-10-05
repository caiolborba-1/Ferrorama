<?php ?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login de Usuario</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../scripts/relogio_navbar.js"></script>
        <link rel="stylesheet" href="../assets/styles/styles.css">

    </head>

    <header>

     <?php
        include "navbar_login.php";
     ?>

    </header>

    <body class="bg-light">

        <img src="assets/img/trem (2).png" alt="" class="">

        <div class="container d-flex justify-content-center align-items-center vh-100">
            <div id="a" class="card shadow p-4" style="width: 100%; max-width: 400px;">


                <h3 class="text-center mb-4" id="titulo">Login</h3>

                <form id="form-login" action="autenticar_usuario.php" method="POST">

                    <div class="mb-3">
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


                <div class="text-center mt-2"><a href="cadastro_usuario.php">Não tem conta? Cadastre-se!</a></div>

            </div>
        </div>

        

    </body>

</html>