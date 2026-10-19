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


    <div class= "tela_inicial">
         <h1>Trens</h1>
    </div>


    
  <style>
    .duas_colunas .botao{
        font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
  </style>

   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   </head>
   <body>
<div class="display-flex">
   <div class="container d-flex justify-content-center align-items-center vh-100">
        <div id="a" class="card shadow p-4" style="width: 100%; max-width: 400px;">

            <h3 class="text-center mb-4" id="titulo">Cadastro</h3>

            <form id="form-cadastro-trem" method="POST">

                <div class="mb-3">
                    <label class="form-label">Nome do trem</label>
                    <input type="text" id="nome_trem" name="nome_trem" class="form-control" placeholder="Digite o nome do trem" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Destino</label>
                    <input type="text" id="destino_trem" name="destino_trem" class="form-control" placeholder="Digite o destino" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário de partida</label>
                    <input type="time" id="horario_partida" name="horario_partida" class="form-control" placeholder="Digite o horário" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário de chegada</label>
                    <input type="time" id="horario_chegada" name="horario_chegada" class="form-control" placeholder="Digite o horário" required>
                </div>


                <button id="button" type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>

           

            
        </div>


        


    </div>




 </div>   

    
   

   

</body>

</html>