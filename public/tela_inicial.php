<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

$cidadeClima = '';
$ufClima = '';

if (isset($_SESSION['usuario_id'])) {
    $stmtClima = $conn->prepare(
        "SELECT cidade_usuario, uf_usuario FROM usuario WHERE id = ?"
    );

    $stmtClima->bind_param("i", $_SESSION['usuario_id']);
    $stmtClima->execute();

    $dadosClima = $stmtClima->get_result()->fetch_assoc();

    if ($dadosClima) {
        $cidadeClima = $dadosClima['cidade_usuario'] ?? '';
        $ufClima = $dadosClima['uf_usuario'] ?? '';
    }

    $stmtClima->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">

    <script src="../scripts/relogio_navbar.js" defer></script>
    <script src="../scripts/clima.js" defer></script>

    <title>Início de Administrador</title>
</head>

<body>

    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <main class="container-fluid py-4">

        <br><br>

        <div class="tela_inicial">
            <h1>Bem-vindo adm!</h1>
        </div>

        <section
            id="clima"
            class="card shadow p-4 mx-auto my-5"
            style="max-width: 850px;"
            data-cidade="<?= htmlspecialchars($cidadeClima, ENT_QUOTES, 'UTF-8') ?>"
            data-uf="<?= htmlspecialchars($ufClima, ENT_QUOTES, 'UTF-8') ?>">

            <h2 class="text-center mb-4">Clima da sua cidade</h2>

            <div id="conteudo-clima" class="text-center">
                Carregando informações do clima...
            </div>

        </section>

        <br><br>

        <div class="tres_colunas">

            <button type="button" class="botao fundo_branco">
                <h3>eree</h3>
            </button>

            <button type="button" class="botao fundo_branco">
                <h3>eree</h3>
            </button>

            <button type="button" class="botao fundo_branco">
                <h3>eree</h3>
            </button>

        </div>

    </main>

    <script src="../scripts/links_paginas.js"></script>

</body>
</html>