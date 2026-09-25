<html lang="en">    

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../scripts/relogio_navbar.js"></script>
        <link rel="stylesheet" href="../assets/styles/styles.css">
        <title>Cadastrar Sensor</title>
    </head>
    
    <body class="justify-content-center align-items-center">
        
        <header class="position-absolute">

         <?php
            include "navbar_adm.php";
         ?>

        </header>

    <div class="container d-flex justify-content-center align-items-center padding-top: 50px;">
       

        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <div class=""> <div><h1>Novo Sensor</h1></div></div>

            <br> <br>
            <input class="" type="text" placeholder="Nome">

            <br>
            <input class="" type="text" placeholder="Localização">

            <br>

            <select class="" placeholder="Tipo">
                <option value="">Selecione o tipo</option>
                <option value="temperatura">Temperatura</option>
                <option value="pressao">Pressão</option>
                <option value="velocidade">Velocidade</option>
                <option value="frenagem">Frenagem</option>
                <option value="falhas">Falhas</option>
                <option value="combustivel">Combustível</option>
            </select>

            <br>

            <select class="" placeholder="Tipo">
                <option value="">Selecione o Trem alocado</option>
                <option value="trem1">Trem 1</option>
                <option value="trem2">Trem 2</option>
                <option value="trem3">Trem 3</option>
                <option value="trem4">Trem 4</option>
            </select>

            <br>

            <button id="botao_cadastrar" type="submit" class="btn btn-primary w-100">Cadastrar</button>

        </div>

        <script src="../scripts/Cadastro_sensor.js"></script>
    </body>
</html>