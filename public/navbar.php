
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
    $link_inicio = '../ndex.php';
}
?>

<div class="cabecalho borda_debaixo_animada">


    <a href="<?php echo htmlspecialchars($link_inicio); ?>">
        <img
            src="../assets/img/nova_logo_amarela.png"
            alt="Logo Ferrorama"
            class="logo_cabecalho"
        >
    </a>

    
    
   


    <button
        type="button"
        onclick="voltarPagina()"
        class="botao_cabecalho afundar"
    >
        <h5><b>VOLTAR</b></h5>
    </button>

    <?php if ($cargo === 'adm'): ?>

        <button
            type="button"
            onclick="location.href='tela_inicial_adm.php'"
            class="botao_cabecalho afundar"
        >
            <h5><b>INÍCIO ADM</b></h5>
        </button>

        <button
            type="button"
            onclick="location.href='tela_inicial.php'"
            class="botao_cabecalho afundar"
        >
            <h5><b>TRENS</b></h5>
        </button>

        <button
            type="button"
            onclick="location.href='visualizar_sensores.php'"
            class="botao_cabecalho afundar"
        >
            <h5><b>SENSORES</b></h5>
        </button>

        <button
            type="button"
            onclick="location.href='visualizar_rotas.php'"
            class="botao_cabecalho afundar"
        >
            <h5><b>ROTAS</b></h5>
        </button>

        <button
            type="button"
            onclick="location.href='visualizar_cadastro.php'"
            class="botao_cabecalho afundar"
        >
            <h5><b>USUARIOS</b></h5>
        </button>

        <button
            type="button"
            onclick="location.href='perfil.php'"
            class="botao_cabecalho afundar"
        >
            <h5><b>PERFIL</b></h5>
        </button>

    <?php elseif ($cargo === 'usuario'): ?>

        <button
            type="button"
            onclick="location.href='tela_usuario.php'"
            class="botao_cabecalho afundar"
        >
            <h5><b>INÍCIO</b></h5>
        </button>

        <button
            type="button"
            onclick="location.href='perfil.php'"
            class="botao_cabecalho afundar"
        >
            <h5><b>PERFIL</b></h5>
        </button>

    <?php endif; ?>

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
        window.location.href = '../index.php';
    }
}
</script>

<script src="../scripts/tela_cheia.js"></script>
<script src="../scripts/relogio_navbar.js"></script>
