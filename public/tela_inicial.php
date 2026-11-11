
<?php
require_once __DIR__ . '/auth.php';
require_once '../infra/conexao.php';

$cargo = $_SESSION['cargo'] ?? '';

$sql = "SELECT id, nome_trem, destino_trem, horario_partida, horario_chegada
        FROM trens
        ORDER BY id DESC";

$resultado = mysqli_query($conn, $sql);

$mensagem = '';

if (isset($_GET['mensagem']) && $_GET['mensagem'] === 'excluido') {
    $mensagem = 'Trem excluído com sucesso!';
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início - Ferrorama</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">

    <script src="../scripts/randomizar_imagem_trem.js"></script>
    <script src="../scripts/relogio_navbar.js" defer></script>

    <style>

        .tela_inicial {
            text-align: center;
            margin: 25px auto;
            padding: 0 15px;
        }

        .acoes_adm {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
            margin: 25px auto;
            padding: 0 15px;
        }

        @media (max-width: 768px) {
            .duas_colunas {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 15px;
            }
        }

        @media (max-width: 480px) {
            .duas_colunas {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>



<body>

    <header>
        <?php include "navbar.php"; ?>
    </header>
    

    <main class="main_rotas_tela_inicial container mt-5">

        <?php if ($mensagem !== ''): ?>
            <div class="alert alert-success text-center">
                <?= htmlspecialchars($mensagem, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <?php if ($cargo === 'usuario'): ?>

        <div class="tela_inicial">
            <h1>Bem-vindo!</h1>
        </div>

        <div class="tela_inicial">
            <h2>Veja os Horários dos Trens</h2>
        </div>
        
        <?php endif; ?>


        <?php if ($cargo === 'adm'): ?>

        <div class="tela_inicial">
            <h2>Veja os Horários dos Trens</h2>
        </div>
        
        <?php endif; ?>

            <div class="d-flex justify-content-center">
        <?php if ($cargo === 'adm'): ?>

            <div class="acoes_adm_trens">

                <a href="tela_dos_trens_adm.php" class="btn botao_brilhante fundo_azul color-white">
                   </i><strong>Adicionar Trem</strong>
                </a>

                <a href="visualizar_trens.php" class="btn fundo_amarelo color-white">
                    <strong>Visualizar Trens</strong>
                </a>

                <a href="cadastro_rotas.php" class="btn botao_brilhante fundo_azul color-white">
                    <strong>Adicionar Rota</strong>
                </a>

                <a href="visualizar_rotas.php" class="btn fundo_amarelo color-white">
                    <strong>Visualizar Rotas</strong>
                </a>

            </div>

        <?php endif; ?>

        <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>

            <div class="duas_colunas">

                <?php while ($trem = mysqli_fetch_assoc($resultado)): ?>

                    <button
                        type="button"
                        class="botao fundo_branco padding-0 overflow-hidden"
                        onclick="location.href='tela_informacoes_trem.php?id=<?= (int) $trem['id'] ?>'">

                        <div class="w-100 h-25 align-items-center justify-content-center p-2 fundo_azul color-white">
                            <?= htmlspecialchars($trem['destino_trem'], ENT_QUOTES, 'UTF-8') ?>
                        </div>

                        <div class="w-100 h-75">
                            <div class="imagem_trem_botao h-100" id="lista-trens"></div>
                        </div>
                        

                    </button>

                <?php endwhile; ?>

            </div>

        <?php else: ?>

            <div class="text-center my-5">
                <h3>Não há nenhum trem registrado no momento.</h3>
            </div>

        <?php endif; ?>

        </div>

    </main>

    <footer>

        <?php include 'rodape.php' ?>

   </footer>

</body>
</html>
