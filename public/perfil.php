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

    <title>Perfil</title>

    <link rel="stylesheet" href="../assets/styles/styles.css">

</head>


<body>

<header class="position-absolute">

    <?php
    include "navbar.php";
    ?>

</header>
    

    <div class="pad display_flex justify-content-center padding ">
       
            <h1>Perfil de Usuario</h1>

            <button class="btn btn-danger botao_sair_perfil" onclick="window.location.href='logout.php'">Sair</button>
     
       
    </div>

    

    <div>

        <img src="../assets/img/zuka.png" alt="" class="br">

        <div>

            <?php while ($usuario = $resultado->fetch_assoc()) { ?>

                <h1>
                    Nome: <?php echo htmlspecialchars($usuario["nome_usuario"]); ?>
                </h1>

                <h1>
                    E-mail: <?php echo htmlspecialchars($usuario["email_usuario"]); ?>
                </h1>

                <h1>
                    Senha: <?php echo htmlspecialchars($usuario["senha_usuario"]); ?>
                </h1>

            <?php } ?>

        </div>

    </div>

</body>

</html>