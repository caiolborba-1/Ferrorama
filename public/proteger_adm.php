
<?php
require_once __DIR__ . "/auth.php";

if (
    !isset($_SESSION["cargo"]) ||
    $_SESSION["cargo"] !== "adm"
) {
    http_response_code(403);
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acesso Negado - Ferrorama</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/styles/styles.css">
    </head>

    <body class="bg-light">

        <main class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card shadow p-5 text-center" style="max-width: 500px; width: 100%;">

                <h1 class="text-danger mb-3">Acesso negado!</h1>

                <p class="fs-5">
                    Você não tem permissão para acessar esta página.
                </p>

                <p class="text-secondary">
                    Apenas administradores podem acessar este conteúdo.
                </p>

                <a href="javascript:history.back()" class="btn btn-primary mt-3">
                    Voltar
                </a>

            </div>
        </main>

    </body>
    </html>
    <?php
    exit;
}


