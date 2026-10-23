
<?php
include('../infra/conexao.php');


$sql = "SELECT rotas.*, trens.nome_trem
        FROM rotas
        INNER JOIN trens ON rotas.id_trens = trens.id
        ORDER BY rotas.id DESC";

$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotas Cadastradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js" defer></script>
</head>
<body>

    <?php include "navbar.php"; ?>

    <main class="container py-5">
        <h1 class="text-center mb-4">Rotas Cadastradas</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Rota</th>
                        <th>Descrição</th>
                        <th>Distância</th>
                        <th>Trem Vinculado</th>
                        <th>ID do Trem</th>
                        <th>Duração</th>
                        <th>Data de Criação</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($rota = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= (int)$rota['id'] ?></td>
                            <td><?= htmlspecialchars($rota['nome_rota']) ?></td>
                            <td><?= htmlspecialchars($rota['descricao_rota']) ?></td>
                            <td><?= htmlspecialchars((string)$rota['distancia_rota']) ?></td>
                            <td><?= htmlspecialchars($rota['nome_trem']) ?></td>
                            <td><?= (int)$rota['id_trens'] ?></td>
                            <td><?= htmlspecialchars((string)$rota['duracao_rota']) ?></td>
                            <td><?= htmlspecialchars($rota['data_criacao']) ?></td>
                            <td>
                                <a href="editar_rotas.php?id=<?= (int)$rota['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td>
                                <form action="excluir_rotas.php" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir esta rota?');">
                                    <input type="hidden" name="id" value="<?= (int)$rota['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <a href="cadastro_rotas.php" class="btn btn-success">Cadastrar Rota</a>
    </main>

</body>
</html>
