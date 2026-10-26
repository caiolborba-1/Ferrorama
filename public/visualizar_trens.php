<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

$sql = "SELECT t.*, u.nome_usuario 
        FROM trens t 
        INNER JOIN usuario u ON t.id_usuario = u.id 
        ORDER BY t.id DESC";

$resultado = $conn->query($sql);
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
                        <th>Usuário Responsável</th>
                        <th>Destino</th>
                        <th>Partida</th>
                        <th>Chegada</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>

                <tbody>

                    <?php if ($resultado && $resultado->num_rows > 0): ?>

                        <?php while ($trem = $resultado->fetch_assoc()): ?>

                            <tr>
                                <td><?= (int) $trem['id'] ?></td>

                                <td>
                                    <?= htmlspecialchars($trem['nome_trem'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($trem['nome_usuario'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($trem['destino_trem'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($trem['horario_partida'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($trem['horario_chegada'], ENT_QUOTES, 'UTF-8') ?>
                                </td>

                                <td>
                                    <a
                                        href="editar_trem.php?id=<?= (int) $trem['id'] ?>"
                                        class="btn btn-primary btn-sm">
                                        Editar
                                    </a>
                                </td>

                                <td>
                                    <form
                                        action="excluir_trem.php"
                                        method="POST"
                                        onsubmit="return confirm('Tem certeza que deseja excluir este trem?');">

                                        <input
                                            type="hidden"
                                            name="id"
                                            value="<?= (int) $trem['id'] ?>">

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        <?php endwhile; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="8" class="text-center">
                                Nenhum trem cadastrado.
                            </td>
                        </tr>

                    <?php endif; ?>

                </tbody>
            </table>
        </div>

        <a href="tela_dos_trens_adm.php" class="btn btn-success">
            Cadastrar Trem
        </a>

    </main>

</body>

</html>