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
    $link_inicio = '../index.php';
}

?>

<style>
    .cabecalho {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 8px 18px;
        position: relative;
        gap: 10px;
    }

    /* Logo */
    .cabecalho > a:first-child {
        flex-shrink: 0;
    }

    .logo_cabecalho {
        display: block;
        margin: 0;
    }

    h5 {
        margin: 0;
    }

    /* Botões do administrador */
    .grupo_adm {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 28px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    .grupo_adm .botao_cabecalho {
        padding: 9px 16px;
        white-space: nowrap;
    }

    /* Perfil */
    .botao_perfil {
        margin-left: auto;
        margin-right: 45px;
        flex-shrink: 0;
    }

    /* Espaçamento do usuário */
    .espacamento_nav {
        flex: 1;
    }

    /* Botão voltar do usuário */
    .botao_voltar {
        margin-left: 25px;
        flex-shrink: 0;
    }

    @media (max-width: 900px) {
        .cabecalho {
            flex-wrap: wrap;
            justify-content: center;
            gap: 8px;
        }

        .grupo_adm {
            position: static;
            transform: none;
            flex-wrap: wrap;
            gap: 16px;
            order: 3;
            width: 100%;
        }

        .espacamento_nav {
            display: none;
        }

        .botao_voltar {
            margin-left: 10px;
        }

        .botao_perfil {
            margin-left: auto;
            margin-right: 20px;
        }
    }
</style>

<div class="cabecalho borda_debaixo_animada ">

    <!-- LOGO -->
    <a href="<?= htmlspecialchars($link_inicio, ENT_QUOTES, 'UTF-8') ?>">
        <img
            src="../assets/img/nova_logo_texto.png"
            alt="Logo Ferrorama"
            class="logo_cabecalho"
        >
    </a>

    <?php if ($cargo === 'adm'): ?>

        <!-- BOTÕES DO ADMINISTRADOR -->
        <div class="grupo_adm">

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
                <h5><b>USUÁRIOS</b></h5>
            </button>

        </div>

        <!-- PERFIL DO ADMINISTRADOR -->
        <button
            type="button"
            onclick="location.href='perfil.php'"
            class="botao_cabecalho afundar botao_perfil"
        >
            <h5><b>PERFIL</b></h5>
        </button>

    <?php elseif ($cargo === 'usuario'): ?>

        <!-- VOLTAR DO USUÁRIO -->
        <button
            type="button"
            onclick="voltarPagina()"
            class="botao_cabecalho afundar botao_voltar"
        >
            <h5><b>VOLTAR</b></h5>
        </button>

        <div class="espacamento_nav"></div>

        <!-- PERFIL DO USUÁRIO -->
        <button
            type="button"
            onclick="location.href='perfil.php'"
            class="botao_cabecalho afundar botao_perfil"
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