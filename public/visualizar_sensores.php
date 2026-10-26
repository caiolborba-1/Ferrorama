
<?php
require_once __DIR__ . '/proteger_adm.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início de Administrador - Sensores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <script src="../scripts/relogio_navbar.js" defer></script>
</head>

<body>

    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <main class="container-fluid py-4">

        <div class="text-center mb-4">
            <h1><b>SENSORES</b></h1>
        </div>

        <div class="tres_colunas">

            <div>
                <button onclick="location.href='sensores_velocidade.php'" class="botao">
                    Velocidade
                </button>

                <br><br>

                <button onclick="location.href='sensores_falhas.php'" class="botao">
                    Falhas
                </button>

                <br><br>

                <button onclick="location.href='sensores_pressao_oleo.php'" class="botao">
                    Pressão do óleo
                </button>
            </div>

            <div>
                <button onclick="location.href='sensores_temperatura.php'" class="botao">
                    Temperatura
                </button>

                <br><br>

                <button onclick="location.href='sensores_combustivel.php'" class="botao">
                    Combustível
                </button>

                <br><br>

                <button onclick="location.href='sensores_frenagem.php'" class="botao">
                    Frenagem
                </button>
            </div>

            <div>
                <button onclick="location.href='visualizar_sensores_cadastrados.php'" class="botao">
                    Sensores Cadastrados
                </button>

                <br><br>

                <button onclick="location.href='cadastrar_sensor.php'" class="botao">
                    Cadastrar Sensor
                </button>
            </div>

        </div>

    </main>

</body>

</html>
