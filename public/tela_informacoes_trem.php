
<?php

require_once __DIR__ . '/auth.php';
require_once '../infra/conexao.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: tela_inicial.php");
    exit();
}

$id = (int) $_GET['id'];

$stmt = mysqli_prepare($conn, "SELECT * FROM trens WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$trem = mysqli_fetch_assoc($resultado);

$stmt = mysqli_prepare($conn, "SELECT * FROM rotas WHERE id_trens = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$rotas = mysqli_fetch_assoc($resultado);

$stmt = mysqli_prepare($conn, "SELECT * FROM usuario WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);
$usuario = mysqli_fetch_assoc($resultado);

mysqli_stmt_close($stmt);

if (!$trem) {
    header("Location: tela_inicial.php");
    exit();
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


<style>


    
</style>

<body>

    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <div class="main_rotas_tela_dos_trens_adm container mt-5">

        <h1>Informações do Trem</h1>

        <div class="card shadow p-4 mt-4 mb-5 fundo_azul_escuro">

        <div class="p-2 color-white mb-3 borda_esquerda_titulo">

            <h2>
                <b>
                    <?= htmlspecialchars($trem['destino_trem'], ENT_QUOTES, 'UTF-8') ?>                    
                </b>
            </h2>

        </div>

            <div class="d-flex width-100 gap-5">

                <div>
                    <div class="tabelas_informacoes_trem shadow card fundo_azul color-white">
                    
                    <h5>
                        <strong>Nome do Trem:</strong>
                    </h5>

                    <h3>
                        
                        <?= htmlspecialchars($trem['nome_trem'], ENT_QUOTES, 'UTF-8') ?>
                    </h3>

                    <br>

                    <h5>
                        <strong>Destino do Trem:</strong>
                    </h5>

                    <h3>
                        
                        <?php
                        if ($rotas) {
                            echo $rotas['descricao_rota'];
                        } else {
                            echo "Nenhuma rota anexada.";
                        }
                        ?>
                    </h3>

                    <br>

                    <h5>
                        <strong>Usuario Responsável:</strong>

                    </h5>
                    <h3>
                        
                        <?php               
                        if ($usuario) {
                            echo $usuario['nome_usuario'];
                        } else {
                            echo "Nenhuma usuario vinculado.";
                        }
                        ?>
                    </h3>

                    <br>

                    <h5>
                        <strong>Horário de partida:</strong>
                    </h5>

                    <h3>
                        <?= htmlspecialchars(substr($trem['horario_partida'], 0, 5), ENT_QUOTES, 'UTF-8') ?>
                    </h3>

                    <br>

                    <h5>
                        <strong>Horário de chegada:</strong>
                    </h5>

                    <h3>
                        <?= htmlspecialchars(substr($trem['horario_chegada'], 0, 5), ENT_QUOTES, 'UTF-8') ?>
                    </h3>

                </div>
            
                <?php if ($cargo === 'usuario'): ?>

                    <a href="tela_usuario.php" class="btn fundo_amarelo color-white botao_voltar_trens">
                        Voltar
                    </a>

                <?php else: ?>

                    <a href="tela_inicial.php" class="btn fundo_amarelo color-white botao_voltar_trens">
                        Voltar
                    </a>

                <?php endif; ?>

            </div>

            <div class="tabelas_informacoes_trem shadow card fundo_azul color-white mb-0">

               Muitas coisas bla bla 

            </div>

            </div>

        </div>

        

    </div>

    <footer>

        <?php include 'rodape.php'; ?>

    </footer>

</body>

</html>
