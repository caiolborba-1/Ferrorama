
<?php
include '../infra/conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome_rota = trim($_POST["nome_rota"] ?? '');
    $descricao_rota = trim($_POST["descricao_rota"] ?? '');
    $distancia_rota = $_POST["distancia_rota"] ?? '';
    $trem_rota = $_POST["trem_rota"] ?? '';
    $duracao_rota = $_POST["duracao_rota"] ?? '';
    $data_criacao = $_POST["data_criacao"] ?? '';

    if (!empty($nome_rota) && !empty($descricao_rota) && !empty($distancia_rota) && !empty($trem_rota) && !empty($duracao_rota) && !empty($data_criacao)) {

        $verificar = $conn->prepare("SELECT id FROM rotas WHERE nome_rota = ?");
        $verificar->bind_param("s", $nome_rota);
        $verificar->execute();

        $resultado = $verificar->get_result();

        if ($resultado->num_rows > 0) {

            $mensagem = "Esta rota já está cadastrada!";

        } else {

            $sql = "INSERT INTO rotas (nome_rota, descricao_rota, distancia_rota, trem_rota, duracao_rota, data_criacao) VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $nome_rota, $descricao_rota, $distancia_rota, $trem_rota, $duracao_rota, $data_criacao);

            if ($stmt->execute()) {
                header("Location: login_usuario.php");
                exit();
            } else {
                $mensagem = "Erro ao cadastrar rota.";
            }
        }

    } else {
        $mensagem = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Rotas</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/relogio_navbar.js" defer></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body class="bg-light">

    <header>
        <?php include "navbar.php"; ?>
    </header>

    <img src="assets/img/trem (2).png" alt="" class="">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div id="a" class="card shadow p-4" style="width: 100%; max-width: 400px;">

            <h3 class="text-center mb-4" id="titulo">Cadastro de Rotas</h3>

            <form id="form-login" method="POST">

                <div class="mb-3">
                    <label class="form-label">Nome da Rota</label>
                    <input type="text" id="nome_rota" name="nome_rota" class="form-control" placeholder="Digite o nome da rota" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descrição</label>
                    <textarea id="descricao_rota" name="descricao_rota" class="form-control" rows="3" placeholder="Digite a descrição da rota" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Distância</label>
                    <input type="number" id="distancia_rota" name="distancia_rota" class="form-control" min="1" step="0.01" placeholder="Digite a distância" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Trem Vinculado</label>
                    <input type="number" id="trem_rota" name="trem_rota" class="form-control" step="0.01" placeholder="Digite o trem vinculado" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tempo</label>
                    <input type="time" id="duracao_rota" name="duracao_rota" class="form-control" step="0.01" placeholder="Digite a duração" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Data de Criação</label>
                    <input type="date" id="data_criacao" name="data_criacao" class="form-control" required>
                </div>

                <button id="button" type="submit" class="btn btn-primary w-100">Cadastrar</button>
            </form>

            <div id="mensagem" class="text-center mt-3">
                <?php echo $mensagem; ?>
            </div>

        </div>
    </div>

</body>
</html>
```