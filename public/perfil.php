<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body>
    <?php
    include "navbar.php"
    ?>

    <div class="justify-content-center align-items-center">

            <div class="card-container">
        <h1>Sensores Cadastrados</h1>

        <table class="custom-table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
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