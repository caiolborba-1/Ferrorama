
<?php
session_set_cookie_params(2592000);
session_start();

require_once '../infra/conexao.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_usuario = trim($_POST['nome_usuario'] ?? '');
    $email_usuario = trim($_POST['email_usuario'] ?? '');
    $senha_usuario = $_POST['senha_usuario'] ?? '';

    if (
        $nome_usuario === '' ||
        $email_usuario === '' ||
        $senha_usuario === ''
    ) {
        $mensagem = 'Por favor, preencha todos os campos.';
    } else {
        $verificar = $conn->prepare(
            'SELECT id FROM usuario WHERE email_usuario = ?'
        );

        if (!$verificar) {
            $mensagem = 'Erro ao verificar o e-mail.';
        } else {
            $verificar->bind_param('s', $email_usuario);
            $verificar->execute();

            $resultado = $verificar->get_result();

            if ($resultado->num_rows > 0) {
                $mensagem = 'Este e-mail já está cadastrado!';
            } else {
                $senha_hash = password_hash(
                    $senha_usuario,
                    PASSWORD_DEFAULT
                );

                $cargo = 'usuario';

                $sql = "INSERT INTO usuario
                        (nome_usuario, email_usuario, senha_usuario, cargo)
                        VALUES (?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);

                if (!$stmt) {
                    $mensagem = 'Erro ao preparar o cadastro.';
                } else {
                    $stmt->bind_param(
                        'ssss',
                        $nome_usuario,
                        $email_usuario,
                        $senha_hash,
                        $cargo
                    );

                    if ($stmt->execute()) {
                        $_SESSION['sucesso_cadastro'] =
                            'Cadastro realizado com sucesso! Faça seu login.';

                        header('Location: visualizar_cadastro.php');
                        exit();
                    } else {
                        $mensagem = 'Erro ao cadastrar usuário.';
                    }

                    $stmt->close();
                }
            }

            $verificar->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro - Usuario</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body class="">

    <?php  include 'navbar.php'  ?>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">

            <h3 class="text-center mb-4" id="titulo">Adição de Usuario</h3>

            <form id="form-cadastro" action="" method="POST">

                <div class="mb-3">
                    <label for="nome_usuario" class="form-label">
                        Nome de Usuário
                    </label>

                    <input
                        type="text"
                        id="nome_usuario"
                        name="nome_usuario"
                        class="form-control"
                        placeholder="Digite seu nome"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="email_usuario" class="form-label">
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email_usuario"
                        name="email_usuario"
                        class="form-control"
                        placeholder="Digite seu e-mail"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="senha_usuario" class="form-label">
                        Senha
                    </label>

                    <input
                        type="password"
                        id="senha_usuario"
                        name="senha_usuario"
                        class="form-control"
                        placeholder="Digite sua senha"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Cadastrar
                </button>

            </form>

            <?php if ($mensagem !== ''): ?>
                <div class="alert alert-danger text-center mt-3">
                    <?= htmlspecialchars($mensagem) ?>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <script src="../assets/scripts/links_paginas.js"></script>

</body>
</html>
