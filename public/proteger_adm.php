
<?php
require_once __DIR__ . "/auth.php";

if (
    !isset($_SESSION["cargo"]) ||
    $_SESSION["cargo"] !== "adm"
) {
    http_response_code(403);
    exit("Acesso negado. Apenas administradores podem acessar esta página.");
}
