<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

$sql = "SELECT * FROM usuario";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/relogio_navbar.js" defer></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">

    <title>Visualização de Cadastros</title>
</head>

<body>

    <header class="position-absolute">
        <?php include "navbar.php"; ?>
    </header>

    <main class="container py-5">

        <br><br><br><br><br><br>

        <h1 class="text-center mb-4">Usuários Cadastrados</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome de Usuário</th>
                        <th>E-mail</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>

                        <?php while ($usuario = mysqli_fetch_assoc($resultado)): ?>
                            <tr>
                                <td>
                                    <?= htmlspecialchars($usuario['nome_usuario']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($usuario['email_usuario']) ?>
                                </td>
                                <td>
                                    <a
                                        href="editar_usuario.php?id=<?= (int) $usuario['id'] ?>"
                                        class="btn btn-primary btn-sm">
                                        Editar
                                    </a>
                                </td>

                                <td>
                                    <a
                                        href="excluir.php?id=<?= (int) $usuario['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="5" class="text-center">
                                Nenhum usuário cadastrado.
                            </td>
                        </tr>

                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <a href="adicionar_usuario.php" class="btn btn-success">
            Adicionar Usuário
        </a>

    </main>

</body>

</html>