
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$cargo = $_SESSION['cargo'] ?? '';

if ($cargo === 'adm') {
    $link_inicio = 'tela_inicial_adm.php';
} elseif ($cargo === 'usuario') {
    $link_inicio = 'tela_usuario.php';
} else {
    $link_inicio = 'login_usuario.php';
}
?>

<div class="cabecalho">

    <a href="<?php echo htmlspecialchars($link_inicio); ?>">
        <img
            src="../assets/img/Logo Atual.png"
            alt="Logo Ferrorama"
            class="logo_cabecalho"
        >
    </a>

    <button
        type="button"
        onclick="voltarPagina()"
        class="botao_cabecalho afundar"
    >
        <b>VOLTAR</b>
    </button>

    <?php if ($cargo === 'adm'): ?>

        <button
            type="button"
            onclick="location.href='tela_inicial_adm.php'"
            class="botao_cabecalho afundar"
        >
            <b>INÍCIO ADM</b>
        </button>

        <button
            type="button"
            onclick="location.href='tela_inicial.php'"
            class="botao_cabecalho afundar"
        >
            <b>TRENS</b>
        </button>

        <button
            type="button"
            onclick="location.href='visualizar_sensores.php'"
            class="botao_cabecalho afundar"
        >
            <b>SENSORES</b>
        </button>

        <button
            type="button"
            onclick="location.href='visualizar_rotas.php'"
            class="botao_cabecalho afundar"
        >
            <b>ROTAS</b>
        </button>

        <button
            type="button"
            onclick="location.href='perfil.php'"
            class="botao_cabecalho afundar"
        >
            <b>PERFIL</b>
        </button>

    <?php elseif ($cargo === 'usuario'): ?>

        <button
            type="button"
            onclick="location.href='tela_usuario.php'"
            class="botao_cabecalho afundar"
        >
            <b>INÍCIO</b>
        </button>

        <button
            type="button"
            onclick="location.href='perfil.php'"
            class="botao_cabecalho afundar"
        >
            <b>PERFIL</b>
        </button>

    <?php endif; ?>

    <div id="relogio" class="relogio">00:00:00</div>

</div>

<div id="conteudo-do-sistema"></div>

<script>
function voltarPagina() {
    const cargo = <?= json_encode($cargo) ?>;

    if (cargo === 'adm') {
        window.location.href = 'tela_inicial_adm.php';
    } else if (cargo === 'usuario') {
        window.location.href = 'tela_usuario.php';
    } else {
        window.location.href = 'login_usuario.php';
    }
}
</script>

<script src="../scripts/tela_cheia.js"></script>
<script src="../scripts/relogio_navbar.js"></script>
