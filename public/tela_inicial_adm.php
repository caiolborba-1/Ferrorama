
<?php
require_once __DIR__ . '/proteger_adm.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js" defer></script>

    <title>Início de Administrador</title>
</head>

<body>

    <header>
    </header>

    <div class="justify-content-center align-items-center display_flex gap-200 tela_inteira">

        <div class="text-center mt-3">
            <img src="../assets/img/Logo Atual.png" alt="Logo">
        </div>

        <div>
            <div class="justify-content-center">
                <h1><b>Bem-vindo, Administrador!<br></b></h1>
            </div>

            <div class="justify-content-center">
                <h1><b>O que gostaria de ver?<br></b></h1>
            </div>

            <div class="justify-content-center gap-5">
                <button onclick="location.href='tela_inicial.php'" class="botao afundar">
                    <b>TRENS</b>
                </button>

                <button onclick="location.href='visualizar_sensores.php'" class="botao afundar">
                    <b>SENSORES</b>
                </button>
            </div>

            <br>

            <div class="justify-content-center gap-5">
                <button onclick="location.href='perfil.php'" class="botao afundar">
                    <b>PERFIL</b>
                </button>

                <button onclick="location.href='visualizar_cadastro.php'" class="botao afundar">
                    <b>Usuários Cadastrados</b>
                </button>
            </div>
        </div>

    </div>

    <script src="../scripts/links_paginas.js"></script>

</body>

</html>
