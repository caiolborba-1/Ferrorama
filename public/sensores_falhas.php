<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../scripts/relogio_navbar.js"></script>
        <link rel="stylesheet" href="../assets/styles/styles.css">
        <title>Sensor de Falhas </title>
    </head>
    
    <body class="">
    
    <header>

     <?php
        include "navbar.php";
     ?>

    </header>

    <div class="display2">
        <br>

        <div class="justify-content-center">
            <div>
                <h1>Sensor de Falhas</h1>
            </div>
        </div>

    
        <div class="spacearound">

            <div class="display-flex align-items-center gap-5 TabelaFrenagem margin">

                <div>
                    <h2>ID: Trem 1</h2> <br> 
                    <h2>ID: Trem 2</h2> <br>
                    <h2>ID: Trem 3</h2> <br>
                    <h2>ID: Trem 4</h2> <br>
                </div>

                <div>
                    <h2>Falhas Ativas: S/N</h2> <br>
                    <h2>Falhas Ativas: 2</h2> <br>
                    <h2>Falhas Ativas: 1</h2> <br>
                    <h2>Falhas Ativas: 4</h2> <br> 
                </div>

            </div>


          

            <div class="TabelaFrenagem">

                <div style="width: 500px;">

                    <h2>Condição dos Sensores</h2>

                    <canvas id="graficoFalhas"></canvas>

                </div>

            </div>

        </div>


        <script>

            const ctx = document.getElementById('graficoFalhas');

            new Chart(ctx, {

                type: 'radar',

                data: {

                    labels: [
                        'Temperatura',
                        'Pressão',
                        'Vibração',
                        'Freio',
                        'Combustível'
                    ],

                    datasets: [

                        {
                            label: 'Trem 1',
                            data: [80, 60, 30, 20, 70]
                        },

                        {
                            label: 'Trem 2',
                            data: [60, 40, 70, 50, 40]
                        },

                        {
                            label: 'Trem 3',
                            data: [90, 80, 20, 30, 85]
                        },

                        {
                            label: 'Trem 4',
                            data: [40, 30, 90, 80, 50]
                        }

                    ]

                },

                options: {

                    scales: {

                        r: {
                            beginAtZero: true,
                            max: 100
                        }

                    }

                }

            });

        </script>


        <div class="Justify-content-center">
            <div>
                <h1>Detalhe das falhas</h1>
            </div>
        </div>
            
    
        <div class="painel-oleo">

            <div class="escala-esquerda">
                <span>80 PSI</span>
                <span>50 PSI</span>
                <span>20 PSI</span>
                <span>0 PSI</span>
            </div>

            <div class="dados-direita">
                <span class="valor-atual">48</span>
                <span class="unidade">PSI Óleo</span>
            </div>

            <svg viewBox="0 0 1000 150" preserveAspectRatio="none">

                <line x1="0" y1="37.5" x2="1000" y2="37.5" stroke="#222834" stroke-width="1" />

                <line x1="0" y1="75" x2="1000" y2="75" stroke="#222834" stroke-width="1" />

                <line x1="0" y1="112.5" x2="1000" y2="112.5" stroke="#222834" stroke-width="1" />
                
                <line x1="0" y1="115" x2="1000" y2="115" stroke="#ff3333" stroke-width="2" stroke-dasharray="5,5" />
                
                <path d="M0,70 L150,68 L300,75 L450,50 L600,55 L750,72 L900,60 L1000,65" 
                    fill="none" 
                    stroke="#00e676" 
                    stroke-width="3" 
                    stroke-linecap="round" />

            </svg>

        </div>
    
    </div>

</body>

</html>