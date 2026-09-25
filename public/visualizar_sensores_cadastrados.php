<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/relogio_navbar.js"></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <title>Visualização de Sensores Cadastrados</title>
</head>

<body class="a">

   <header class="position-absolute"> <?php include "navbar_adm.php"; ?> </header>

        <div class="justify-content-center align-items-center">

            <div class="card-container">
        <h1>Sensores Cadastrados</h1>

        <table class="custom-table">
            <thead>
            <tr>
                <th>Nome do sensor</th>
                <th>Localização</th>
                <th>Tipo</th>
                <th>Trem Alocado</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Sensor 1</td>
                <td>Estação Norte</td>
                <td>Velocímetro</td>
                <td>Trem 1</td>
                <td><button class="edit-button">Editar</button></td>
                <td><button class="delete-button">Excluir</button></td>
            </tr>
            <tr>
                <td>Sensor 2</td>
                <td>Estação Sul</td>
                <td>Pressão</td>
                <td>Trem 2</td>
                <td><button class="edit-button">Editar</button></td>
                <td><button class="delete-button">Excluir</button></td>
            </tr>
            </tbody>
        </table>
        </div>

        </div>

</body>

</html>


