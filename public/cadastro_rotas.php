<?php
include '../infra/conexao.php';

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome_rota  = trim($_POST["nome_rota"] ?? '');
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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro de Rotas</title>
</head>
<body>

    <header>
        <?php include "navbar_login.php"; ?>
    </header>



    <div class="container d-flex justify-content-center align-items-center padding-top: 50px;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            
        <h2>Cadastre uma rota</h2>

                <form action="public/cadastrar.php" method="POST">
                    <label for ="nome_rota">Nome da rota:</label>
                        <input type="text" id="nome_rota" name="nome_rota"> 
                    <br>
                    <textarea name="descricao_rota" rows="5" cols="33">Descrição</textarea>
                    <br> <br>
                    <label for="distancia_rota">Distância:</label>
                        <input type="text" name="distancia_rota">
                    <br> <br>
                    <label for="trem_rota">Trem Vinculado:</label>
                        <input type="text" name="trem_rota">
                    <br> <br>
                    <label for="duracao_rota">Tempo:</label>
                        <input type="text" name="duracao_rota">
                    <br> <br>
                    <label for="data_criacao">data de criação:</label>
                        <input type="date" id="data_criacao" name="data_criacao">
                        <br> <br>    
                    <button type="submit">Cadastrar</button>
                </form>
                 
                

              
    
            </div>
    </div>
</body>
</html>