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

             <div class="display2">
        <br>
       <div class="justify-content-center"> 

    
       <div class="justify-content-center">

        <div class="TabelaFrenagem" >

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
            .tabela-falhas {
             display: flex;
             align-items: center;
             gap: 5rem;
            background-color: rgba(120, 130, 214, 0.863);
            padding: 15px;
            border-radius: 3px;
            margin-left: 200px;
            margin-bottom: 4rem;
            margin-top: 4rem;
            box-shadow: -12px 12px 15px rgba(0, 0, 0, 0.35);
                
            }


        </style>
          

            <div class="tabela-falhas">

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

</body>

</html>