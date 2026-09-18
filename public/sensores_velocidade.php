<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Velocidade</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<header><?php include 'navbar.php'; ?></header>

<body class="">

    <div class="display2">

        <div>

            <br>

            <div class="justify-content-center"><h1>Velocidade</h1></div>

            <br>
            <br>
            <div class="spacearound">

                <div class="TabelaVelocidade" >

                    <div>
                        <h2>ID: Trem 1</h2>
                        <h2>ID: Trem 2</h2>
                        <h2>ID: Trem 3</h2>
                        <h2>ID: Trem 4</h2>
                    </div>

                    <div>
                        <h2>Velocidade: X km/h</h2>
                        <h2>Velocidade: X km/h</h2>
                        <h2>Velocidade: X km/h</h2>
                        <h2>Velocidade: X km/h</h2>
                    </div>

                </div>

                <br>
                <br>

            
            
                <div style="width: 80%; max-width: 900px;">
                    <canvas id="graficoVelocidade"></canvas>
                </div>

            </div>

            <script scr="../scripts/links_paginas.js"></script>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

            <script>

                const grafico = document.getElementById('graficoVelocidade');

                new Chart(grafico, {
                    type: 'line',

                    data: {
                        labels: [
                            '0', '1', '2', '3',
                            '4', '5', '6', '7',
                            '8', '9', '10', '11'
                        ],

                        datasets: [{
                            label: 'Velocidade',

                            data: [
                                30,
                                70,
                                105,
                                130,
                                145,
                                175,
                                135,
                                148,
                                217,
                                195,
                                95,
                                55
                            ],

                            borderWidth: 2,

                            pointRadius: 4,

                            tension: 0
                        }]
                    },

                    options: {
                        responsive: true,

                        plugins: {
                            title: {
                                display: true,
                                text: 'Velocidade dos Trens'
                            }
                        },

                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Tempo'
                                }
                            },

                            y: {
                                beginAtZero: true,

                                title: {
                                    display: true,
                                    text: 'Velocidade (km/h)'
                                }
                            }
                        }
                    }
                });

            </script>
        
        </div>

    </div>
</body>
</html>