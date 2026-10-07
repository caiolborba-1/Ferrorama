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
    include "navbar_adm.php"
    ?>

    <br><br>

    <div class= "tela_inicial">
         <h1>Trens</h1>
    </div>

    <br><br><br>
    
  <style>
    .duas_colunas .botao{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
  </style>

<div class="duas_colunas">

    <div class=" justify-content: center"> 
        <button class="botao" onclick="location.href='tela_localização_trem1.php'" >TREM 1 <br> BRASIL - ARGENTINA</button>
            <br>
        <button class="botao" onclick="location.href='tela_localização_trem3.php'" >TREM 3 <br> NEPAL - UZBEQUISTÃO</button>
    </div>
   
    <div  class="justify-content: center,">
        <button class="botao" onclick="location.href='tela_localização_trem2.php'" >TREM 2 <br> PERU - EQUADOR</button>
            <br>
        <button class="botao" onclick="location.href='tela_localização_trem4.php'" >TREM 4 <br> MARANHÃO - RIO</button>
    </div>
   

</div>


   

</body>

</html>