
<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login_usuario.php");
    exit();
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js"></script>
    <title>Inicio de Administrador</title>
</head>

<header>



</header>



<body class="">

    <div class="justify-content-center align-items-center display_flex gap-200 tela_inteira">

        <div class="text-center mt-3">
            <img src="../assets/img/Logo Atual.png" alt="Logo" class="">
        </div>

        <div class="">
            <div class="justify-content-center">
                <h1><b>Bem Vindo Administrador!<br></b></h1>
            </div>

            <div class="justify-content-center  gap-5">
                <button onclick="location.href='tela_dos_trens_adm.php'" class="botao afundar"><b>TRENS</b></button>
                <button onclick="location.href='visualizar_sensores.php'" class="botao afundar"><b>SENSORES</b></button>
            </div>

            <div class="justify-content-center gap-5">
                 <button onclick="location.href='perfil.php'" class="botao afundar"><b>PERFIL</b></button>
                                     
                <button onclick="location.href='visualizar_cadastro.php'" class="botao">
                    Usuários Cadastrados
                </button></a>
            </div>

        

    </div>

    <script src="../scripts/links_paginas.js"></script>
</body>

</html>