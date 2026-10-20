
<?php
include('../infra/conexao.php');

$resultado = $conn->query("SELECT * FROM trens ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trens Cadastrados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js" defer></script>
</head>
<body>

    <?php include "navbar.php"; ?>

    <main class="container py-5">
        <h1 class="text-center mb-4">Trens Cadastrados</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do Trem</th>
                        <th>Destino</th>
                        <th>Partida</th>
                        <th>Chegada</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($trem = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= (int)$trem['id'] ?></td>
                            <td><?= htmlspecialchars($trem['nome_trem']) ?></td>
                            <td><?= htmlspecialchars($trem['destino_trem']) ?></td>
                            <td><?= htmlspecialchars($trem['horario_partida']) ?></td>
                            <td><?= htmlspecialchars($trem['horario_chegada']) ?></td>
                            <td>
                                <a href="editar_trem.php?id=<?= (int)$trem['id'] ?>" class="btn btn-primary btn-sm">Editar</a>
                            </td>
                            <td>
                                <form action="excluir_trem.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este trem?');">
                                    <input type="hidden" name="id" value="<?= (int)$trem['id'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <a href="tela_dos_trens_adm.php" class="btn btn-success">Cadastrar Trem</a>
    </main>

</body>
</html>
