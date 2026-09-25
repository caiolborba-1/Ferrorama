<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script src="../scripts/relogio_navbar.js"></script>
     <link rel="stylesheet" href="../assets/styles/styles.css">
    <title>Sensor de Pressão do óleo</title>
</head>


<body class="">
    
    <header>

     <?php
        include "navbar_adm.php";
     ?>

    </header>

    <div class="display2">
        <br>
       <div class="justify-content-center"> <div><h1>Pressão do Óleo</h1></div></div>

    
       <div class="spacearound">

        <div class="display-flex align-items-center gap-5 TabelaFrenagem margin" >

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
                        <td>pressão: X PSI</td>
                        
                    </tr>

                    <tr>
                        <td>Trem 2</td>
                        <td>pressão: X PSI</td>
                    </tr>

                    <tr>
                        <td>Trem 3</td>
                        <td>pressão: X PSI</td>
                    </tr>

                    <tr>
                        <td>Trem 4</td>
                        <td>pressão: X PSI</td>
                    </tr>
                    </tbody>
                </table>    

                </div>

        <div style="width: 45%; margin: auto; padding: 2rem; border-radius: 2px;">

                <canvas id="graficoCombustivel"></canvas>

            </div>


            <script>

                const ctx = document.getElementById('graficoCombustivel');

                new Chart(ctx, {

                    type: 'line',

                    data: {
                        labels: ['08:00', '09:00', '10:00', '11:00'],

                        datasets: [{
                            label: 'Pressão do Óleo (PSI)',
                            data: [32, 8, 16, 65]
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