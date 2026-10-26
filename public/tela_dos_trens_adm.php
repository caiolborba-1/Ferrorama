<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

$mensagem = '';

$sql_usuarios = "SELECT id, nome_usuario FROM usuario ORDER BY nome_usuario ASC";
$result_usuarios = $conn->query($sql_usuarios);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_trem = trim($_POST['nome_trem'] ?? '');
    $destino_trem = trim($_POST['destino_trem'] ?? '');
    $horario_partida = $_POST['horario_partida'] ?? '';
    $horario_chegada = $_POST['horario_chegada'] ?? '';
    $id_usuario = filter_input(INPUT_POST, 'id_usuario', FILTER_VALIDATE_INT);

    if (
        $nome_trem === '' ||
        $destino_trem === '' ||
        !$id_usuario ||
        !preg_match('/^\d{2}:\d{2}$/', $horario_partida) ||
        !preg_match('/^\d{2}:\d{2}$/', $horario_chegada)
    ) {
        $mensagem = 'Preencha todos os campos corretamente.';
    } else {
        $sql = "INSERT INTO trens
                (usuario_trem, nome_trem, destino_trem, horario_partida, horario_chegada, id_usuario)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param(
            "issssi",
            $id_usuario,
            $nome_trem,
            $destino_trem,
            $horario_partida,
            $horario_chegada,
            $id_usuario
        );

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: visualizar_trens.php");
            exit;
        }

        $mensagem = 'Erro ao cadastrar o trem.';
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Trens</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js" defer></script>
</head>

<body class="bg-light">

    <?php include "navbar.php"; ?>

    <main class="container py-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 500px;">

            <h2 class="text-center mb-4">Cadastro de Trens</h2>

            <?php if ($mensagem !== ''): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?>
                </div>
            <?php endif; ?>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Usuário Responsável</label>
                    <select name="id_usuario" class="form-select" required>
                        <option value="">Selecione um usuário...</option>
                        <?php if ($result_usuarios && $result_usuarios->num_rows > 0): ?>
                            <?php while ($usuario = $result_usuarios->fetch_assoc()): ?>
                                <option value="<?= $usuario['id'] ?>">
                                    <?= htmlspecialchars($usuario['nome_usuario'], ENT_QUOTES, 'UTF-8') ?>
                                </option>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nome do trem</label>
                    <input
                        type="text"
                        name="nome_trem"
                        class="form-control"
                        maxlength="100"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Destino</label>
                    <input
                        type="text"
                        name="destino_trem"
                        class="form-control"
                        maxlength="100"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário de partida</label>
                    <input
                        type="time"
                        name="horario_partida"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Horário de chegada</label>
                    <input
                        type="time"
                        name="horario_chegada"
                        class="form-control"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Cadastrar Trem
                </button>

                <a href="visualizar_trens.php" class="btn btn-secondary w-100 mt-2">
                    Visualizar Trens
                </a>

            </form>
        </div>
    </main>

</body>

</html>