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
        include "navbar_adm.php";
     ?>

    </header>

    <div class="display2">
        <br>
       <div class="justify-content-center"> <div><h1>Sensor de Temperatura</h1></div></div> <br>

    
       <div class="justify-content-center">

        <div class="tabelaVelocidade" >

                <table class="custom-table">
                    <thead>
                    <tr>
                        <th>Nome do Trem</th>
                        <th>Estatística</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Trem 1</td>
                        <td>Temperatura: 64.1 °C</td>
                        
                    </tr>

                    <tr>
                        <td>Trem 2</td>
                        <td>Temperatura: 75.2 °C</td>
                    </tr>

                    <tr>
                        <td>Trem 3</td>
                        <td>Temperatura: 68.5 °C</td>
                    </tr>

                    <tr>
                        <td>Trem 4</td>
                        <td>Temperatura: 89.1 °C</td>
                    </tr>
                    </tbody>
                </table>    

                </div>


                <div class="grafico_termperatura">
                    <canvas id="graficoSensores"></canvas>
                </div> 

    </div>
        <div class="Justify-content-center"> <div><h1>Termômetro Digital</h1></div></div>
      
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
                    <div class="escala-ponto"  0;">0°C</div>
                    <div class="escala-ponto">20°</div>
                    <div class="escala-ponto">40°</div>
                    <div class="escala-ponto">60°</div>
                    <div class="escala-ponto">80°</div>
                    <div class="escala-ponto">100°</div>
                    <div class="escala-ponto" ">120°C</div>
                </div>
            </div>
        
    
    </div>

    <script src="../scripts/grafico_temperatura.js"></script>

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