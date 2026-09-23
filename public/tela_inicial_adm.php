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

    <?php
    include "navbar.php";
    ?>

</header>

<body class="">

    <div class="">

        <br>

        <div class="justify-content-center">
            <h1><b>SENSORES</b></h1>
        </div>

    <br>

        <div class="tres_colunas">
            <div class="">
                <a href="../public/sensores_velocidade.php"><button class="botao">
                        Velocidade
                </button></a>
 <br>

  
                <a href="../public/sensores_falhas.php"><button class="botao">
                        falhas
                    </button></a>
 <br>
                    <a href="../public/sensores_pressao_oleo.php"><button class="botao">
                        pressão do óleo
                </button></a>

 <br>
            </div>

            <div class="">
                <a href="../public/sensores_temperatura.php"><button class="botao">
                    Temperatura
                </button></a>
 <br>
                <a href="../public/sensores_combustivel.php"><button class="botao">
                    Combustível
                </button></a>
 <br>
                <a href="../public/sensores_frenagem.php"><button class="botao">
                    Frenagem
                </button></a>
 <br>
                


</div>

            <div class="">
                    
                <a href="../public/visualizar_cadastro.php"><button class="botao">
                     Usuários Cadastrados
                </button></a>
 <br>
                <a href="../public/visualizar_sensores_cadastrados.php"><button class="botao">
                     Sensores Cadastrados
                </button></a>

<br>
                <a href="../public/cadastrar_sensor.php"><button class="botao">
                        cadastrar sensor
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