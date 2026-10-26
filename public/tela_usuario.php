<?php
session_start();

if (
    !isset($_SESSION['usuario_id']) ||
    !isset($_SESSION['cargo']) ||
    $_SESSION['cargo'] !== 'usuario'
) {
    header('Location: ../index.php');
    exit();
}

require_once '../infra/conexao.php';

$sql = "SELECT * FROM trens ORDER BY id DESC";
$resultado = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início - Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js" defer></script>

    <style>
        .duas_colunas {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 40px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px 20px;
        }

        .duas_colunas .botao {
            width: 100%;
            min-height: 150px;
            padding: 15px;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            overflow-wrap: anywhere;
        }

        .tela_inicial {
            text-align: center;
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

    <?php include "navbar.php"; ?>

    <main class="container-fluid py-4">

        <div class="tela_inicial">
            <h1>Bem-vindo!</h1>
        </div>

        <div class="tela_inicial">
            <h2>Veja os Horários dos Trens</h2>
        </div>

        <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>

            <div class="duas_colunas">

                <?php while ($trem = mysqli_fetch_assoc($resultado)): ?>

                    <button
                        type="button"
                        class="botao"
                        onclick="location.href='tela_informacoes_trem.php?id=<?= (int)$trem['id'] ?>'">

                        <strong>
                            <?= htmlspecialchars($trem['nome_trem']) ?>
                        </strong>

                        <br>

                        Destino: <?= htmlspecialchars($trem['destino_trem']) ?>

                        <br>

                        <?= htmlspecialchars(substr($trem['horario_partida'], 0, 5)) ?>
                        -
                        <?= htmlspecialchars(substr($trem['horario_chegada'], 0, 5)) ?>

                    </button>

                <?php endwhile; ?>

            </div>

        <?php else: ?>

            <div class="text-center my-5">
                <h3>Não há nenhum trem registrado no momento.</h3>
            </div>

        <?php endif; ?>

    </main>

</body>
</html>
```