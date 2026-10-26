
<?php
require_once __DIR__ . '/auth.php';
require_once '../infra/conexao.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: tela_usuario.php");
    exit;
}

$id = (int) $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM trens WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$trem = mysqli_fetchassoc($resultado);

mysqli_stmt_close($stmt);

if (!$trem) {
    header("Location: tela_usuario.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">

    <title>Informações do Trem</title>
</head>

<body>

    <?php include "navbar.php"; ?>

    <div class="container mt-5">

        <h1>Informações do Trem</h1>

        <div class="card shadow p-4 mt-4">

            <h3>
                <?= htmlspecialchars($trem['nome_trem'], ENT_QUOTES, 'UTF-8') ?>
            </h3>

            <p>
                <strong>Destino:</strong>
                <?= htmlspecialchars($trem['destino_trem'], ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                <strong>Horário de partida:</strong>
                <?= htmlspecialchars(substr($trem['horario_partida'], 0, 5), ENT_QUOTES, 'UTF-8') ?>
            </p>

            <p>
                <strong>Horário de chegada:</strong>
                <?= htmlspecialchars(substr($trem['horario_chegada'], 0, 5), ENT_QUOTES, 'UTF-8') ?>
            </p>

            <a href="tela_usuario.php" class="btn btn-primary">
                Voltar
            </a>

        </div>

    </div>

</body>

</html>
