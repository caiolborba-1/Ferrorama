<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">

    <script src="../scripts/relogio_navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Sensor de Combustível</title>
</head>

<body>

    <?php include 'navbar.php'; ?>

    <style>
        .tabela_combustivel_1 {
    align-items: center;
    gap: 5rem;
    background-color: rgba(120, 130, 214, 0.863);
    padding: 1rem;
    border-radius: 3px;
    margin: 4rem;
    box-shadow: -12px 12px 15px rgba(0, 0, 0, 0.35);
    width: fit-content;
        }
    </style>
<br>


    <div class="justify-content-center"><br> <h1>Monitoramento dos Sensores de Combustivel</h1> <br></div>

    <div class="display_flex ">

        <div class="tabelaVelocidade">

            <div class="" >


            </div>  

                <table class="custom-table">

                    <thead>

                        <tr>
                            <th>Trem</th>
                            <th>Combustível</th>
                            <th>Capacidade</th>
                            <th>Nível</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td>Trem 1</td>
                            <td>800 L</td>
                            <td>1200 L</td>
                            <td>66%</td>
                            <td>Normal</td>
                        </tr>

                        <tr>
                            <td>Trem 2</td>
                            <td>500 L</td>
                            <td>1200 L</td>
                            <td>41%</td>
                            <td>Atenção</td>
                        </tr>

                        <tr>
                            <td>Trem 3</td>
                            <td>1000 L</td>
                            <td>1200 L</td>
                            <td>83%</td>
                            <td>Normal</td>
                        </tr>

                        <tr>
                            <td>Trem 4</td>
                            <td>650 L</td>
                            <td>1200 L</td>
                            <td>53%</td>
                            <td>Normal</td>
                        </tr>

                    </tbody>

                </table>


        </div>



        <div style="width: 60%; margin: auto; padding: 2rem; border-radius: 2px;">

            <canvas id="graficoCombustivel"></canvas>

        </div>

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



    <div style="width: 100%; display: flex; justify-content: center; margin-top: 1px;">

        <div class="TabelaPressao">

            <div style="display: flex; justify-content: center; gap: 50px;">

                <div>
                    <h1>Combustível Máximo: 1000 L</h1>
                </div>

                <div>
                    <h1>Combustível Mínimo: 500 L</h1>
                </div>

                <div>
                    <h1>Combustível Médio: 650 L</h1>
                </div>

            </div>

        </div>

    </div>


</body>

</html>