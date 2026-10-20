<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="../assets/styles/styles.css">
     <script src="../scripts/relogio_navbar.js"></script>
    <title>Inicio</title>
</head>

<body class="">

    <?php
    include "navbar.php"
    ?>
    <?php
        include "../infra/conexao.php";
    $sql = "SELECT * FROM trens";
    $resultado = mysqli_query($conn, $sql);

    ?>


    <br><br>

    <div class= "tela_inicial">
         <h1>Bem - Vindo!</h1>
    </div>

    <div class="tela_inicial">
        <h1>Veja os Horários dos Trens</h1>
    </div>

    <br><br><br>
    
 <style>
    .duas_colunas {
    display: grid;
    grid-template-columns: repeat(3, 2fr);
    gap: 40px;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px;
}

.duas_colunas .botao {
    width: 100%;
    min-height: 100px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
}
  </style>




    <?php if (mysqli_num_rows($resultado) > 0) { ?>

    <div class="duas_colunas">

    <?php while ($trem = mysqli_fetch_assoc($resultado)) { ?>
        <button class="botao"
            onclick="location.href='tela_informacoes_trem.php?id=<?php echo $trem['id']; ?>'">
            <?php echo htmlspecialchars($trem['nome_trem']); ?>
            <br>
            <?php echo htmlspecialchars($trem['destino_trem']); ?>
            <br>
            <?php echo substr($trem['horario_partida'], 0, 5); ?> - <?php echo substr($trem['horario_chegada'], 0, 5); ?>
        </button>
    <?php } ?>

    </div>
<?php } else { ?>

    <div class="justify-content-center"><h1>Não há nenhum trem registrado no momento</h1></div>

<?php } ?>

    <br> <br>

    <?php if ($cargo === 'adm'): ?>
        <div class="tela_inicial">
            <button onclick="location.href='tela_dos_trens_adm.php'" class="botao_adicionar_trem afundar"><b>Adicionar Trem</b></button>

            <button onclick="location.href='visualizar_trem_cadastrado.php'" class="botao_adicionar_trem afundar"><b>Trens Cadastrados</b></button>
        </div>
        

        <br>
   <?php endif; ?>

</body>

</html>