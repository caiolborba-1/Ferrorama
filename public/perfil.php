<?php

session_start();

include("../infra/conexao.php");

$id = $_SESSION["usuario_id"];

$sql = "SELECT * FROM usuario WHERE id = '$id'";

$resultado = $conn->query($sql);

?>

<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../scripts/relogio_navbar.js"></script>

    <title>Perfil</title>

    <link rel="stylesheet" href="../assets/styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>


<body class="d-flex flex-column min-vh-100 align-items-center justify-content-">

<header class="w-100">

    <?php
    include "navbar.php";
    ?>

</header>

    <main class="main_rotas_perfil container mt-5 ">

        <div class="display_flex">
            
            <h1>Perfil de Usuario</h1>
            
        </div>

        <div class="fundo_branco">

            <div class="">

            <?php while ($usuario = $resultado->fetch_assoc()) { ?>
                <div class="d-flex padding mb-5 3rem align-items-center fundo_azul color-white nome_perfil">
                    <img src="../assets/img/usu.png" alt="" class="br mr-5">
                     <h1><?php echo htmlspecialchars($usuario["nome_usuario"]); ?></h1>
                </div>
                

                <div>

                        <h3 class="linhas_perfil">
                            <b>E-mail:</b> <?php echo htmlspecialchars($usuario["email_usuario"]); ?>
                        </h3>

                        <h3 class="linhas_perfil">
                            <b>Senha:</b> *****
                        </h3>

                        <h3 class="linhas_perfil">
                            <b>Cidade:</b> <?php echo htmlspecialchars($usuario["cidade_usuario"]); ?>
                        </h3>

                         <h3 class="linhas_perfil">
                            <b>Cargo:</b> <?php echo htmlspecialchars($usuario["cargo"]); ?>
                        </h3>
                    
                        
                    <br>

                    <button class="btn btn-danger b" onclick="window.location.href='logout.php'">Sair da Sessão</button>
                
                </div>

            <?php } ?>

            </div>

        </div>

    </main>

    <footer class="w-100 mt-auto">

        <?php include "rodape.php"; ?>

    </footer>

</body>

</html>