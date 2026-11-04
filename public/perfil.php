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


<body class="d-flex flex-column min-vh-100">

<header class="w-100">

    <?php
    include "navbar.php";
    ?>

</header>

    <main class="main_rotas container mt-5 ">

        <div class="display_flex">
            
            <h1>Perfil de Usuario</h1>
            
        </div>

        <div class="fundo_branco display_flex">

            <div class="A">

                <img src="../assets/img/usu.png" alt="" class="br">

                <div>

                    <?php while ($usuario = $resultado->fetch_assoc()) { ?>

                        <h1>
                            Nome: <?php echo htmlspecialchars($usuario["nome_usuario"]); ?>
                        </h1>

                        <h1>
                            E-mail: <?php echo htmlspecialchars($usuario["email_usuario"]); ?>
                        </h1>

                        <h1>
                            Senha:*****
                        </h1>

                    <?php } ?>
                        
                    <button class="btn btn-danger b" onclick="window.location.href='logout.php'">Sair da Sessão</button>
                
                </div>

            </div>

        </div>

    </main>

    <footer class="w-100 mt-auto">

        <?php include "rodape.php"; ?>

    </footer>

</body>

</html>