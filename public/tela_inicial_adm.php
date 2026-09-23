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
                <a href=""><button class="botao">
                        Velocidade
                </button></a>
 <br>

  
                <a href=""><button class="botao">
                        falhas
                    </button></a>
 <br>
                    <a href=""><button class="botao">
                        pressão do óleo
                </button></a>

 <br>
            </div>

            <div class="">
                <button onclick="pagina_temperatura(event)" class="botao">
                    Temperatura
                </button>
 <br>
                <button onclick="pagina_combustivel(event)" class="botao">
                    Combustível
                </button>
 <br>
                <button onclick="pagina_frenagem(event)" class="botao">
                    Frenagem
                </button>
 <br>
                


</div>

            <div class="">
                    
                <button onclick="pagina_usuarios(event)" class="botao">
                     Usuários Cadastrados
                </button>
 <br>
                <button onclick="pagina_sensores(event)" class="botao">
                     Sensores Cadastrados
                </button>

<br>
                <button onclick="pagina_cadastrar_sensor(event)" class="botao">
                        cadastrar sensor
                </button>

                </div>
                
                </div>
            </div>

        </div>

    </div>


    </div>
    </div>

</body>

</html>