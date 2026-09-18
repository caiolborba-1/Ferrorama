<?php

    include "../infra/conexao.php";

?>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/styles/styles.css">

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <title>Sensor de Combustivel</title>
    </head>

    <body class="aling-items-center">

        <?php include 'navbar.php'; ?>

        <div class="container">

            <div>
                <br>
                <br>
                <h1>Combustivel</h1>
                <br><br>
            </div>

            <div style="width: 80%; margin: auto;">
                <canvas id="graficoCombustivel"></canvas>
            </div>

            <script>
                const ctx = document.getElementById('graficoCombustivel');

                new Chart(ctx, {
                    type: 'bar',

                    data: {
                        labels: ['Trem 1', 'Trem 2', 'Trem 3', 'Trem 4'],

                        datasets: [{
                            label: 'Combustível (L)',
                            data: [800, 500, 1000, 650]
                        }]
                    },

                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>

        </div>

    </body>

</html>