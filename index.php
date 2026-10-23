<?php
session_set_cookie_params(2592000);
session_start();



$cargo_sessao = $_SESSION['cargo'] ?? '';

if (isset($_SESSION['usuario_id'])) {
    if ($cargo_sessao === 'adm') {
        header('Location: public/tela_inicial_adm.php');
        exit();
    } elseif ($cargo_sessao === 'usuario') {
        header('Location: public/tela_usuario.php');
        exit();
    }
}

$erro = $_SESSION['login_erro'] ?? '';
$sucesso = $_SESSION['sucesso_cadastro'] ?? '';

unset($_SESSION['login_erro'], $_SESSION['sucesso_cadastro']);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - Ferrorama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">
</head>

<body class="A margin">

    <div class="text-center mt-3">
        <img src="assets/img/Logo Atual.png" alt="Logo Ferrorama">
    </div>

    <main class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow p-4">

                    <h2 class="text-center mb-4">Entrar no Ferrorama</h2>

                    <?php if ($erro !== ''): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($erro) ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($sucesso !== ''): ?>
                        <div class="alert alert-success">
                            <?= htmlspecialchars($sucesso) ?>
                        </div>
                    <?php endif; ?>

                    <form action="public/autenticar_usuario.php" method="POST">

                        <div class="mb-3">
                            <label for="login_identificador" class="form-label">
                                Nome de usuário ou e-mail
                            </label>

                            <input
                                type="text"
                                name="login_identificador"
                                id="login_identificador"
                                class="form-control"
                                autocomplete="username"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="senha_usuario" class="form-label">
                                Senha
                            </label>

                            <input
                                type="password"
                                name="senha_usuario"
                                id="senha_usuario"
                                class="form-control"
                                autocomplete="current-password"
                                required
                            >
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Entrar
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </main>

</body>
</html>