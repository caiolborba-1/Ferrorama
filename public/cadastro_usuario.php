<?php
include '../infra/conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome_usuario  = trim($_POST["nome_usuario"] ?? '');
    $email_usuario = trim($_POST["email_usuario"] ?? '');
    $senha_usuario = $_POST["senha_usuario"] ?? '';

    $senha_usuario = password_hash("$senha_usuario", PASSWORD_DEFAULT);

    if (!empty($nome_usuario) && !empty($email_usuario) && !empty($senha_usuario)) {

        
        $verificar = $conn->prepare("SELECT id FROM usuario WHERE email_usuario = ?");
        $verificar->bind_param("s", $email_usuario);
        $verificar->execute();

        $resultado = $verificar->get_result();

        if ($resultado->num_rows > 0) {

            $mensagem = "Este e-mail já está cadastrado!";

        } else {

            $sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario) VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $nome_usuario, $email_usuario, $senha_usuario);

            if ($stmt->execute()) {
                header("Location: login_usuario.php");
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
    <title>Cadastro de Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/relogio_navbar.js" defer></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body class="bg-light">

    <header>
        <?php include "navbar_login.php"; ?>
    </header>

    

    <img src="assets/img/trem (2).png" alt="" class="">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div id="a" class="card shadow p-4" style="width: 100%; max-width: 400px;">

            <h3 class="text-center mb-4" id="titulo">Cadastro</h3>

            <form id="form-login" method="POST">

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

                <button id="button" type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>

            <div id="mensagem" class="text-center mt-3">
                <?ph echo $mensagem; ?>
            </div>

            <div class="text-center mt-2">
                <a href="login_usuario.php">Já tem conta? Entre!</a>
            </div>

        </div>
    </div>

</body>
</html>