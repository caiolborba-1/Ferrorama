<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src="../scripts/relogio_navbar.js"></script>
    <title>Velocidade</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>


<body class="">

    <header><?php include 'navbar_adm.php'; ?></header>

    <div class="display2">

        <div>

            <br>

            <div class="justify-content-center"><h1>Velocidade</h1></div>

            <br>
            <br>

            <div class="justify-content-center">

                <div class="TabelaVelocidade">

                    <table class="custom-table">

                        <thead>

                            <tr>
                                <th>Trem</th>
                                <th>Velocidade Atual</th>
                                <th>Limite</th>
                                <th>Situação</th>
                            </tr>

                        </thead>

                        <tbody>

                            <tr>
                                <td>Trem 1</td>
                                <td>154 km/h</td>
                                <td>160 km/h</td>
                                <td>Normal</td>
                            </tr>

                            <tr>
                                <td>Trem 2</td>
                                <td>123 km/h</td>
                                <td>160 km/h</td>
                                <td>Normal</td>
                            </tr>

                            <tr>
                                <td>Trem 3</td>
                                <td>105 km/h</td>
                                <td>160 km/h</td>
                                <td>Baixa</td>
                            </tr>

                            <tr>
                                <td>Trem 4</td>
                                <td>130 km/h</td>
                                <td>160 km/h</td>
                                <td>Normal</td>
                            </tr>

                        </tbody>

                    </table>

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
                            'Trem 1', 'Trem2', 'trem 3', 'trem4' 
                        ], 
 
                        datasets: [{ 
                            label: 'Velocidade Média', 
 
                            data: [ 
                                154, 
                                123, 
                                105, 
                                130 
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
                                    text: '' 
                                } 
                            }, 
 
                            y: { 
                                beginAtZero: true, 
 
                                title: { 
                                    display: true, 
                                    text: 'Velocidade Média (km/h)' 
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