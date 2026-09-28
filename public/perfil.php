<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body class="a">
<header class="position-absolute">
    <?php
    include "navbar.php"
    ?>
</header>

    <div class="justify-content-center align-items-center">

            <div class="card-container">
        <h1>Perfil de Usuario</h1>

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
                <td>1</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Senha</td>
                <td><button class="edit-button">Editar</button></td>
                <td><button class="delete-button">Excluir</button></td>
            </tr>
            </tbody>
        </table>
        </div>

        </div>

</body>
</html>