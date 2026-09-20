<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src="../scripts/termometro.js"></script>
    <script src="../scripts/relogio_navbar.js"></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">

    <title>Sensor de Temperatura</title>
</head>

<body class="">
    
    <header>

     <?php
        include "navbar.php";
     ?>

    </header>

    <div class="display2">
        <br>
       <div class="justify-content-center"> <div><h1>Sensor de Temperatura</h1></div></div>

    
       <div class="spacearound">

         <div class="display-flex align-items-center gap-5 TabelaFrenagem margin">
            <div>
                <h2>ID: Trem 1</h2> <br> 
                <h2>ID: Trem 2</h2> <br>
                <h2>ID: Trem 3</h2> <br>
                <h2>ID: Trem 4</h2> <br>
            </div>

            <div>
                <h2>Temperatura: --.- °C</h2> <br>
                <h2>Temperatura: 75.2 °C</h2> <br>
                <h2>Temperatura: 68.5 °C</h2> <br>
                <h2>Temperatura: 89.1 °C</h2> <br>
            </div>

            
        </div>

        <img src="../assets/img/sale-fulbito.webp" alt="Sale-fulbito">

    </div>
        <div class="Justify-content-center"> <div><h1>Detalhe das falhas</h1></div></div>
      
        <div class="justify-content-center">
            <div class="painel-container">
                <div class="titulo">Temp. Motor do Trem</div>
                <!-- Exibição do valor exato em texto -->
                <div id="display" class="display-digital">--.- °C</div>
                
                <!-- O Termômetro deitado -->
                <div class="canaleta-termometro">
                    <div id="barra" class="barra-liquido"></div>
                </div>

                <!-- Régua de Graus (Modificável conforme seu limite máximo) -->
                <div class="escala-container">
                    <div class="escala-ponto" style="width: 0;">0°C</div>
                    <div class="escala-ponto">20°</div>
                    <div class="escala-ponto">40°</div>
                    <div class="escala-ponto">60°</div>
                    <div class="escala-ponto">80°</div>
                    <div class="escala-ponto">100°</div>
                    <div class="escala-ponto" style="width: 0; text-align: right;">120°C</div>
                </div>
            </div>
        
    
    </div>

</body>






</html>

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