<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/styles/styles.css">
        <script src="../scripts/relogio_navbar.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <title>Sensor de Combustivel</title>
    </head>

    

    <body class="">

        <?php include 'navbar.php'; ?>

       

        <div class="display_flex align-items-center gap-5">

         <div class="TabelaFrenagem">

                <div class="">

                    <h1>Tabela de Informações</h1>

                    <table class="table  tabela_informacoes">

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

            </div>



            <div style="width: 50%; margin: auto; padding: 2rem; border-radius: 2px;">

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


        <div class="display_flex gap-5">


            <div class="TabelaFrenagem">

                <div>
                    <h1>Combustível Máximo:</h1> <br>
                    <h1>Combustível Mínimo:</h1> <br>
                    <h1>Combustível Médio:</h1> <br>
                </div>

                <div>
                    <h1>1000 L</h1> <br>
                    <h1>500 L</h1> <br>
                    <h1>650 L</h1> <br>
                </div>

            </div>


           


        </div>

    </body>

</html>