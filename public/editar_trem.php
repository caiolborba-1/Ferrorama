<?php

include ('../infra/conexao.php');

$id = $_GET["id"];
$sql = "SELECT * FROM trens WHERE id = $id";
$resultado = mysqli_query($conn, $sql);

$trem = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editando Trem</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>
    <header>
        
       <?php include "navbar.php"; ?>

    </header>
    <main class="justify-content-center tela_inteira">
        
        <div>
            <h2>Editando o trem: <?php echo htmlspecialchars($trem["nome_trem"]); ?></h2>
                <form action="atualizar_trem.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $trem["id"]; ?>">

                    <label for="nome_trem">Nome do Trem:</label>
                    <input type="text" name="nome_trem" id="nome_trem" value="<?php echo htmlspecialchars($trem["nome_trem"]); ?>" required>
                    <br>
                    
                    <label for="destino_trem">Destino:</label>
                    <input type="text" name="destino_trem" id="destino_trem" value="<?php echo htmlspecialchars($trem["destino_trem"]); ?>" required>
                    <br>
                    
                    <label for="horario_partida">Horário de Partida:</label>
                    <input type="time" name="horario_partida" id="horario_partida" value="<?php echo $trem["horario_partida"]; ?>" required>
                    <br>
                    
                    <label for="horario_chegada">Horário de Chegada:</label>
                    <input type="time" name="horario_chegada" id="horario_chegada" value="<?php echo $trem["horario_chegada"]; ?>" required>
                    <br>
                    
                    <button type="submit">Atualizar Trem</button>
                </form>
        </div>

    </main>

</body>

</html>