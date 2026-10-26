
<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: visualizar_rotas.php");
    exit;
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM rotas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$rota = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$rota) {
    header("Location: visualizar_rotas.php");
    exit;
}

$trens = $conn->query(
    "SELECT id, nome_trem FROM trens ORDER BY nome_trem"
);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Rota</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>

    <?php include "navbar.php"; ?>

    <main class="container py-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 600px;">

            <h2 class="text-center mb-4">Editar Rota</h2>

            <form action="atualizar_rotas.php" method="POST">

                <input
                    type="hidden"
                    name="id"
                    value="<?= (int) $rota['id'] ?>"
                >

                <div class="mb-3">
                    <label for="nome_rota" class="form-label">
                        Nome da rota
                    </label>

                    <input
                        type="text"
                        id="nome_rota"
                        name="nome_rota"
                        class="form-control"
                        maxlength="100"
                        value="<?= htmlspecialchars($rota['nome_rota']) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="descricao_rota" class="form-label">
                        Descrição
                    </label>

                    <textarea
                        id="descricao_rota"
                        name="descricao_rota"
                        class="form-control"
                        maxlength="100"
                        required
                    ><?= htmlspecialchars($rota['descricao_rota']) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="distancia_rota" class="form-label">
                        Distância
                    </label>

                    <input
                        type="number"
                        id="distancia_rota"
                        name="distancia_rota"
                        class="form-control"
                        min="0.01"
                        step="0.01"
                        value="<?= htmlspecialchars((string) $rota['distancia_rota']) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="id_trens" class="form-label">
                        Trem vinculado
                    </label>

                    <select
                        id="id_trens"
                        name="id_trens"
                        class="form-select"
                        required
                    >
                        <option value="">Selecione um trem</option>

                        <?php while ($trem = $trens->fetch_assoc()): ?>
                            <option
                                value="<?= (int) $trem['id'] ?>"
                                <?= ((int) $rota['id_trens'] === (int) $trem['id']) ? 'selected' : '' ?>
                            >
                                <?= htmlspecialchars($trem['nome_trem']) ?>
                                (ID <?= (int) $trem['id'] ?>)
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="duracao_rota" class="form-label">
                        Duração (em horas)
                    </label>

                    <input
                        type="number"
                        id="duracao_rota"
                        name="duracao_rota"
                        class="form-control"
                        min="0.01"
                        step="0.01"
                        value="<?= htmlspecialchars((string) $rota['duracao_rota']) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="data_criacao" class="form-label">
                        Data de criação
                    </label>

                    <input
                        type="datetime-local"
                        id="data_criacao"
                        name="data_criacao"
                        class="form-control"
                        value="<?= htmlspecialchars(date('Y-m-d\TH:i', strtotime($rota['data_criacao']))) ?>"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Atualizar Rota
                </button>

                <a
                    href="visualizar_rotas.php"
                    class="btn btn-secondary w-100 mt-2"
                >
                    Voltar
                </a>

            </form>
        </div>
    </main>

</body>
</html>
