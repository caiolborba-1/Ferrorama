<?php

session_start();

include("../infra/conexao.php");

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome_usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM administrador WHERE nome_adm = '$nome' AND senha_adm = '$senha'";

    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {

        $_SESSION["administrador"] = $nome;

        header("Location: tela_inicial_adm.php");
        exit;

    } else {

        $mensagem = "Nome de usuario ou senha incorreta!";

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Ferrorama</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/styles/styles.css">
    </head>

    <body class="bg-light">

        <header>

            <?php
                include "navbar_login.php";
            ?>

        </header>

        <main class="mn_login">

            <img src="assets/img/trem (2).png" alt="">

            <div class="container d-flex justify-content-center align-items-center vh-100">

                <div class="card shadow p-4" style="width: 100%; max-width: 400px;">

                    <h3 class="text-center mb-4" id="titulo">Login</h3>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label" id="l_nome_usuario">
                                Nome de Usuário
                            </label>

                            <input
                                type="text"
                                name="nome_usuario"
                                id="nome_usuario"
                                class="form-control"
                                placeholder="Digite seu nome"
                                required
                            >
fwefwfffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff
                        </div>

                        <div class="mb-3">

                            <label class="form-label" id="l-senha">
                                Senha
                            </label>

                            <input
                                type="password"
                                name="senha"
                                id="senha"
                                class="form-control"
                                placeholder="Digite sua senha"
                                required
                            >

                        </div>

                        <button
                            id="b"
                            type="submit"
                            class="btn btn-primary w-100">
                            Entrar
                        </button>

                    </form>

                    <?php

                    if ($mensagem != "") {
                        echo "<div class='erro text-center mt-3'>";
                        echo "<p>$mensagem</p>";
                        echo "</div>";
                    }

                    ?>

                </div>

            </div>

        </main>

        <script src="../scripts/relogio_navbar.js"></script>

    </body>

</html>