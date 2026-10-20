
<?php
include('../infra/conexao.php');

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_rota = trim($_POST['nome_rota'] ?? '');
    $descricao_rota = trim($_POST['descricao_rota'] ?? '');
    $distancia_rota = $_POST['distancia_rota'] ?? '';
    $id_trens = $_POST['id_trens'] ?? '';
    $duracao_rota = $_POST['duracao_rota'] ?? '';
    $data_criacao = $_POST['data_criacao'] ?? '';

    if (
        $nome_rota === '' ||
        $descricao_rota === '' ||
        strlen($descricao_rota) > 100 ||
        !is_numeric($distancia_rota) ||
        (float)$distancia_rota <= 0 ||
        !ctype_digit((string)$id_trens) ||
        (int)$id_trens < 1 ||
        !is_numeric($duracao_rota) ||
        (float)$duracao_rota <= 0 ||
        !preg_match('/^\d{4}-\d{2}-\d{2}T\d{2}:\d{2}$/', $data_criacao)
    ) {
        $mensagem = 'Preencha todos os campos corretamente.';
    } else {
        $id_trens = (int)$id_trens;

        $verificar_trem = $conn->prepare("SELECT id FROM trens WHERE id = ?");
        $verificar_trem->bind_param("i", $id_trens);
        $verificar_trem->execute();

        if ($verificar_trem->get_result()->num_rows === 0) {
            $mensagem = 'O trem selecionado não está cadastrado.';
        } else {
            $verificar = $conn->prepare("SELECT id FROM rotas WHERE nome_rota = ?");
            $verificar->bind_param("s", $nome_rota);
            $verificar->execute();

            if ($verificar->get_result()->num_rows > 0) {
                $mensagem = 'Esta rota já está cadastrada.';
            } else {
                $data_formatada = str_replace('T', ' ', $data_criacao) . ':00';
                $distancia = (float)$distancia_rota;
                $duracao = (float)$duracao_rota;
                $trem_rota = (string)$id_trens;

                $sql = "INSERT INTO rotas
                    (nome_rota, descricao_rota, distancia_rota, trem_rota,
                     duracao_rota, data_criacao, id_trens)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($sql);
                $stmt->bind_param(
                    "ssdsdsi",
                    $nome_rota,
                    $descricao_rota,
                    $distancia,
                    $trem_rota,
                    $duracao,
                    $data_formatada,
                    $id_trens
                );

                if ($stmt->execute()) {
                    $stmt->close();
                    $verificar->close();
                    $verificar_trem->close();
                    header("Location: visualizar_rotas.php");
                    exit;
                }

                $mensagem = 'Erro ao cadastrar a rota.';
                $stmt->close();
            }

            $verificar->close();
        }

        $verificar_trem->close();
    }
}

$trens = $conn->query("SELECT id, nome_trem FROM trens ORDER BY nome_trem");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Rotas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js" defer></script>
</head>
<body class="bg-light">

    <?php include "navbar.php"; ?>

    <main class="container py-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 600px;">
            <h2 class="text-center mb-4">Cadastro de Rotas</h2>

            <?php if ($mensagem !== ''): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($mensagem) ?></div>
            <?php endif; ?>

            <?php if ($trens && $trens->num_rows > 0): ?>
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">Nome da rota</label>
                        <input type="text" name="nome_rota" class="form-control" maxlength="100" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descrição</label>
                        <textarea name="descricao_rota" class="form-control" maxlength="100" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Distância</label>
                        <input type="number" name="distancia_rota" class="form-control" min="0.01" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trem vinculado</label>
                        <select name="id_trens" class="form-select" required>
                            <option value="">Selecione um trem</option>
                            <?php while ($trem = $trens->fetch_assoc()): ?>
                                <option value="<?= (int)$trem['id'] ?>">
                                    <?= htmlspecialchars($trem['nome_trem']) ?> (ID <?= (int)$trem['id'] ?>)
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duração (em horas)</label>
                        <input type="number" name="duracao_rota" class="form-control" min="0.01" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Data de criação</label>
                        <input type="datetime-local" name="data_criacao" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Cadastrar Rota</button>
                </form>
            <?php else: ?>
                <div class="alert alert-warning">
                    Nenhum trem cadastrado. Cadastre um trem antes de criar uma rota.
                </div>
            <?php endif; ?>

            <a href="visualizar_rotas.php" class="btn btn-secondary mt-3">Visualizar Rotas</a>
        </div>
    </main>

</body>
</html>
