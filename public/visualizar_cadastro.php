
<?php include ('../infra/conexao.php');


$sql = "SELECT * FROM usuario";

$resultado = mysqli_query($conn, $sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/relogio_navbar.js"></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <title>Visualização de Cadastros</title>
</head>

<body class="justify-content-center align-items-center">

    <header class="position-absolute"> <?php include "navbar.php"; ?> </header>

  <main class="container py-5">

    <br> <br> <br>

    <h1 class="text-center mb-4">Usuários Cadastrados</h1>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome de Usuário</th>
                    <th>E-mail</th>
                    <th>Senha</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($usuario = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['nome_usuario']) ?></td>
                        <td><?= htmlspecialchars($usuario['email_usuario']) ?></td>
                        <td class="password-mask">******</td>
                        <td>
                            <a href="editar_usuario.php?id=<?= (int)$usuario['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                        </td>
                        <td>
                            <a href="excluir.php?id=<?= (int)$usuario['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <a href="adicionar_usuario.php" class="btn btn-success">Adicionar Usuário</a>
</main>
    


</body>

</html>