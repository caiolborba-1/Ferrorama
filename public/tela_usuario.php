
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="../scripts/clima.js" defer></script>

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
            padding: 20px;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            gap: 10px;

            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            overflow-wrap: anywhere;
            word-break: break-word;

            background-color: #fff;
            border: none;
            border-radius: 8px;

            cursor: pointer;
            transition: 0.3s;
        }

        .duas_colunas .botao:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .duas_colunas .botao strong {
            font-size: 20px;
            display: block;
        }

        .informacoes_trem {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
        }

        .tela_inicial {
            text-align: center;
            margin: 25px auto;
            padding: 0 15px;
        }

        /* Card do clima */
        #clima {
            width: 100%;
            max-width: 750px;
            margin: 20px auto;
        }

        #clima h2 {
            font-size: 22px;
        }

        #conteudo-clima .clima-detalhes {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        #conteudo-clima .clima-icone img {
            width: 65px;
            height: 65px;
        }

        #conteudo-clima .clima-temperatura {
            font-size: 30px;
            font-weight: bold;
        }

        #conteudo-clima .clima-condicao {
            font-size: 17px;
        }

        #conteudo-clima .clima-item {
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .duas_colunas {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 15px;
            }

            #clima {
                max-width: 95%;
            }

            #conteudo-clima .clima-detalhes {
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

    <header class="w-100">

        <?php
            include "navbar.php";
        ?>

    </header>

    <main class="main_rotas_tela_usuario container mt-5">

        <div class="tela_inicial">
            <h1>Bem-vindo!</h1>
        </div>

        <section
            id="clima"
            class="card shadow p-3 mx-auto my-5">

            <h2 class="text-center mb-2">Clima da sua cidade</h2>

            <div id="conteudo-clima" class="text-center">
                Carregando informações do clima...
            </div>

        </section>

        <div class="tela_inicial">
            <h2>Veja os Horários dos Trens</h2>
        </div>

        <?php if ($resultado && mysqli_num_rows($resultado) > 0): ?>

            <div class="duas_colunas">

                <?php while ($trem = mysqli_fetch_assoc($resultado)): ?>

                    <button
                        type="button"
                        class="botao fundo_branco"
                        onclick="location.href='tela_informacoes_trem.php?id=<?= (int)$trem['id'] ?>'">

                        <strong>
                            <?= htmlspecialchars($trem['nome_trem'], ENT_QUOTES, 'UTF-8') ?>
                        </strong>

                        <div class="informacoes_trem">

                            <span>
                                Destino:
                                <?= htmlspecialchars($trem['destino_trem'], ENT_QUOTES, 'UTF-8') ?>
                            </span>

                            <span>
                                <?= htmlspecialchars(substr($trem['horario_partida'], 0, 5), ENT_QUOTES, 'UTF-8') ?>
                                -
                                <?= htmlspecialchars(substr($trem['horario_chegada'], 0, 5), ENT_QUOTES, 'UTF-8') ?>
                            </span>

                        </div>

                    </button>

                <?php endwhile; ?>

            </div>

        <?php else: ?>

            <div class="text-center my-5">
                <h3>Não há nenhum trem registrado no momento.</h3>
            </div>

        <?php endif; ?>

    </main>

    <br>
    <br>
    <br>
    <br>
    <br>

    <footer>
        <?php include 'rodape.php'; ?>
    </footer>

</body>
</html>
