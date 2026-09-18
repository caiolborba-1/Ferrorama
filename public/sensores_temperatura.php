<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="./assets/styles.css">

    <title>Sensor de Temperatura</title>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<header>
    <?php include 'navbar.php'; ?>
</header>

<body>

    <div class="dinlay2">

        <div class="">
            <br>
            <h1>Temperatura</h1>
            <br>
            <br>

            <div class="display-flex align-items-center gap-5 TabelaVelocidade">

                <!-- TABELA -->
                <div>
                    <h1>ID: Trem 1</h1>
                    <h1>ID: Trem 2</h1>
                    <h1>ID: Trem 3</h1>
                    <h1>ID: Trem 4</h1>
                </div>

                <div>
                    <h1>temperatura: X C°</h1>
                    <h1>temperatura: X C°</h1>
                    <h1>temperatura: X C°</h1>
                    <h1>temperatura: X C°</h1>
                </div>

            </div>

            <!-- GRÁFICO -->
            <div class="grafico-container">
                <canvas id="graficoTemperatura"></canvas>
            </div>

        </div>

    </div>

    <script>

        const ctx = document.getElementById('graficoTemperatura');

        new Chart(ctx, {

            data: {

                labels: [
                    'Trem 1', 'Trem 2', 'Trem 3', 'Trem 4'
                ],

                datasets: [

                    // BARRAS - CHUVA
                    {
                        type: 'bar',
                        label: '',
                        data: [
                            50, 70, 100, 120
                        ],

                        backgroundColor: '#6FADE5',

                        borderWidth: 0,

                        yAxisID: 'yRainfall'
                    },

                    // LINHA - TEMPERATURA
                    {
                        type: 'line',
                        label: 'temperatura',

                        data: [
                            6, 6, 9, 14,
                        ],

                        borderColor: '#444444',

                        backgroundColor: '#444444',

                        borderWidth: 3,

                        pointBackgroundColor: '#444444',
                        pointBorderColor: '#444444',

                        pointRadius: 6,

                        tension: 0.4,

                        yAxisID: 'yTemperature'
                    }

                ]
            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                interaction: {
                    mode: 'index',
                    intersect: false
                },

                plugins: {

                    legend: {
                        display: false
                    }

                },

                scales: {

                    // EIXO DA TEMPERATURA
                    yTemperature: {

                        type: 'linear',

                        position: 'left',

                        min: 0,
                        max: 200,

                        ticks: {
                            stepSize: 10,

                            callback: function(value) {
                                return value + '°C';
                            }
                        },

                        title: {
                            display: true,
                            text: 'Temperatura'
                        },

                        grid: {
                            color: '#dddddd'
                        }

                    },


                }

            }

        });

    </script>

</body>

</html>