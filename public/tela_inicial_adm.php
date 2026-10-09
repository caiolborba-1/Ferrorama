<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=div, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js"></script>
    <title>Inicio de Administrador</title>
</head>

<header>

    <?php include 'navbar.php'; ?>

</header>



<body class="">



    <div class="">

        <br>

        <div class="justify-content-center align-items-center">
            <h1><b>SENSORES</b></h1>

             <div class="pad display_flex justify-content-center padding ">
       

          
     
       
    </div>
        </div>

    <br>

        <div class="tres_colunas">
            <div class="">
                <button onclick="location.href='sensores_velocidade.php'" class="botao">
                    Velocidade
                </button>
 <br>

  
                <button onclick="location.href='sensores_falhas.php'" class="botao">
                    falhas
                    </button>
 <br>
                <button onclick="location.href='sensores_pressao_oleo.php'" class="botao">
                    pressão do óleo
                </button></a>

 <br>
            </div>

            <div class="">
                <button onclick="location.href='sensores_temperatura.php'" class="botao">
                    Temperatura
                </button></a>
 <br>
                <button onclick="location.href='sensores_combustivel.php'" class="botao">
                    Combustível
                </button></a>
 <br>
                <button onclick="location.href='sensores_frenagem.php'" class="botao">
                    Frenagem
                </button></a>
 <br>
                


</div>

            <div class="">
                    
                <button onclick="location.href='visualizar_cadastro.php'" class="botao">
                    Usuários Cadastrados
                </button></a>
 <br>
                <button onclick="location.href='visualizar_sensores_cadastrados.php'" class="botao">
                    Sensores Cadastrados
                </button></a>

<br>
                <button onclick="location.href='cadastrar_sensor.php'" class="botao">
                    Cadastrar sensor
                </button></a>

                </div>
                
                </div>
            </div>

        </div>

    </div>


    </div>
    </div>

</body>

</html>