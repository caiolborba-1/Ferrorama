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
        include "navbar_adm.php";
     ?>

    </header>

    <div class=" display2">
        <br>

        <div class=" justify-content-center" >

                  <div><h1>Sensor de Falhas</h1></div>

        </div>
        

        

        <div class="display_flex justify-content-center gap-5 align-items-center" >

            
               

            <div class="TabelaVelocidade">
            
               

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
                        <td>Falhas Ativas: S/N</td>
                        
                    </tr>

                    <tr>
                        <td>Trem 2</td>
                        <td>Falhas Ativas: S/N</td>
                    </tr>

                    <tr>
                        <td>Trem 3</td>
                        <td>Falhas Ativas: S/N</td>
                    </tr>

                    <tr>
                        <td>Trem 4</td>
                        <td>Falhas Ativas: S/N</td>
                    </tr>
                    </tbody>
                </table>    

            </div>




        

           <style>
            

            </style>
          

            <div class="TabelaPressao">

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
            max: 100,

            grid: {
                color: '#555555',
                lineWidth: 1
            },

            angleLines: {
                color: '#555555',
                lineWidth: 1
            },

            pointLabels: {
                color: '#000000',
                font: {
                    size: 11,
                    weight: 'bold'
                }
            }

        }

    }

}

            });

        </script>


       
            
    
        
    
    </div>

  


<div class="grafico-bobina">

    <canvas id="grafico-bobina"></canvas>

</div>


<script>

const ctxBobina = document.getElementById('grafico-bobina');

new Chart(ctxBobina, {

    type: 'line',

    data: {

        labels: [
            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
            '11',
            '12',
            '13',
            '14',
            '15',
            '16',
            '17',
            '18',
            '19'
        ],

        datasets: [{

            label: 'Sinal da Bobina',

            data: [
                0,
                0,
                0,
                0,
                0,
                -80,
                -40,
                -25,
                -20,
                -15,
                -10,
                90,
                55,
                45,
                40,
                35,
                50,
                10,
                0,
                0
            ],

            borderColor: '#00ff00',

            backgroundColor: 'transparent',

            borderWidth: 2,

            pointRadius: 0,

            tension: 0.1

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false,

        scales: {

            x: {

                title: {
                    display: true,
                    text: 'Tempo'
                }

            },

            y: {

                title: {
                    display: true,
                    text: 'Amplitude'
                },

                min: -100,
                max: 100

            }

        },

        plugins: {

            legend: {
                display: true
            }

        }

    }

});

</script>

    </div>

</body>

</html>