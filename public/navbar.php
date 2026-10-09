<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$cargo = $_SESSION['cargo'] ?? ''; 
?>

<div class="cabecalho">
    
    <a href="ronaldo.html" onclick="carregarPagina('ronaldo.html'); return false;">
        <img src="../assets/img/Logo Atual.png" alt="" class="logo_cabecalho">
    </a>

    
    <button onclick="history.back()" class="botao_cabecalho afundar"><b>VOLTAR</b></button>

  
    <?php if ($cargo === 'adm'): ?>
        <button onclick="location.href='tela_inicial_adm.php'" class="botao_cabecalho afundar"><b>INÍCIO ADM</b></button>
        <button onclick="location.href='tela_dos_trens_adm.php'" class="botao_cabecalho afundar"><b>TRENS</b></button>
        <button onclick="location.href='visualizar_sensores_cadastrados.php'" class="botao_cabecalho afundar"><b>SENSORES</b></button>

    <?php elseif ($cargo === 'usuario'): ?>
        <button onclick="location.href='tela_inicial.php'" class="botao_cabecalho afundar"><b>INÍCIO</b></button>
        
    <?php endif; ?>

   
    <?php if ($cargo === 'adm' || $cargo === 'usuario'): ?>
        <button onclick="location.href='perfil.php'" class="botao_cabecalho afundar"><b>PERFIL</b></button>
        <button onclick="location.href='logout.php'" class="botao_cabecalho afundar" style="color: #ff4d4d;"><b>SAIR</b></button>
    <?php endif; ?>

    
    <div id="relogio" class="relogio">00:00:00</div>
</div>

<div id="conteudo-do-sistema"></div>

<script src="../scripts/tela_cheia.js"></script>
