```php
<?php

include('../infra/conexao.php');

if (!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
    header("Location: visualizar_rotas.php");
    exit();
}

$id = (int) $_GET["id"];

$sql = "SELECT * FROM rotas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();
$rotas = $resultado->fetch_assoc();

if (!$rotas) {
    header("Location: visualizar_rotas.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Rota</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>

    <header>
        <?php include "navbar.php"; ?>
    </header>

    <main class="justify-content-center tela_inteira">

        <div>
            <h2>Editando Rota <?php echo htmlspecialchars($rotas["nome_rota"]); ?>!</h2>

            <form action="atualizar_rotas.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $rotas["id"]; ?>">

                <label for="nome_rota">Nome da Rota:</label>
                <input type="text" id="nome_rota" name="nome_rota" value="<?php echo htmlspecialchars($rotas["nome_rota"]); ?>" required>
                <br>

                <label for="descricao_rota">Descrição:</label>
                <textarea id="descricao_rota" name="descricao_rota" rows="5" cols="33" required><?php echo htmlspecialchars($rotas["descricao_rota"]); ?></textarea>
                <br>

                <label for="distancia_rota">Distância:</label>
                <input type="number" id="distancia_rota" name="distancia_rota" min="0" step="0.01" value="<?php echo htmlspecialchars($rotas["distancia_rota"]); ?>" required>
                <br>

                <label for="trem_rota">Trem Vinculado:</label>
                <input type="number" id="trem_rota" name="trem_rota" step="0.01" value="<?php echo htmlspecialchars($rotas["trem_rota"]); ?>" required>
                <br>

                <label for="duracao_rota">Tempo:</label>
                <input type="number" id="duracao_rota" name="duracao_rota" min="0" step="0.01" value="<?php echo htmlspecialchars($rotas["duracao_rota"]); ?>" required>
                <br>

                <label for="data_criacao">Data de Criação:</label>
                <input type="datetime-local" id="data_criacao" name="data_criacao" value="<?php echo date('Y-m-d\TH:i', strtotime($rotas["data_criacao"])); ?>" required>
                <br>

                <button type="submit">Atualizar</button