<?php

    include "../infra/conexao.php";



?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/styles/styles.css">
        <title>Sensor de Frenagem</title>
    </head>

    <body class="">

        

        <div class="">
            <?php include 'navbar.php'; ?>
            <div class="">
                <br>
                <br>
                <div>
                    <h1>Frenagem</h1>
                    <br><br>
                </div>
            </div>

            <div class="display-flex align-items-center gap-5 TabelaFrenagem">
                <div>
                    <h1>ID: Trem 1</h1> <br>
                    <h1>ID: Trem 2</h1> <br>
                    <h1>ID: Trem 3</h1> <br>
                    <h1>ID: Trem 4</h1> <br>
                </div>

                <div>
                    <h1>Frenagem: S/N</h1> <br>
                    <h1>Frenagem: S/N</h1> <br>
                    <h1>Frenagem: S/N</h1> <br>
                    <h1>Frenagem: S/N</h1> <br>

                </div>

            </div>

        </div>

        
    </body>

</html>