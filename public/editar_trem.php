
<?php
include('../infra/conexao.php');

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: visualizar_trens.php");
    exit;
}

$id = (int)$_GET['id'];

$stmt = $conn->prepare("SELECT * FROM trens WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$trem = $stmt->get_result()->fetch_assoc();

if (!$trem) {
    header("Location: visualizar_trens.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Trem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>
<body>

    <?php include "navbar.php"; ?>

    <main class="container py-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 500px;">
            <h2 class="text-center mb-4">Editar Trem</h2>

            <form action="atualizar_trem.php" method="POST">
                <input type="hidden" name="id" value="<?= (int)$trem['id'] ?>">

                <div class="mb-3">
                    <label class="form-label">Nome do trem</label>
                    <input type="text" name="nome_trem" class="form-control" maxlength="100"
                        value="<?= htmlspecialchars($trem['nome_trem']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Destino</label>
                    <input type="text" name="destino_trem" class="form-control" maxlength="100"
                        value="<?= htmlspecialchars($trem['destino_trem']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário de partida</label>
                    <input type="time" name="horario_partida" class="form-control"
                        value="<?= htmlspecialchars(substr($trem['horario_partida'], 0, 5)) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário de chegada</label>
                    <input type="time" name="horario_chegada" class="form-control"
                        value="<?= htmlspecialchars(substr($trem['horario_chegada'], 0, 5)) ?>" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Atualizar Trem</button>
                <a href="visualizar_trens.php" class="btn btn-secondary w-100 mt-2">Voltar</a>
            </form>
        </div>
    </main>

</body>
</html>
