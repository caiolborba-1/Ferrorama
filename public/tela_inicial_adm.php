
<?php
require_once __DIR__ . '/proteger_adm.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início de Administrador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">

    <script src="../scripts/relogio_navbar.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js" defer></script>
    <script src="../scripts/clima.js" defer></script>

    <style>
        .secao_clima {
            max-width: 550px;
            margin: 15px auto;
            padding: 10px !important;
        }

        .secao_clima h2 {
            text-align: center;
            font-size: 18px;
            margin-bottom: 5px;
        }

        #conteudo-clima .clima-icone img {
            width: 45px;
            height: 45px;
        }

        #conteudo-clima .clima-temperatura {
            font-size: 24px;
        }

        #conteudo-clima .clima-condicao {
            font-size: 14px;
            margin-bottom: 5px;
        }

        #conteudo-clima .clima-detalhes {
            gap: 20px;
        }

        #conteudo-clima .clima-item {
            font-size: 12px;
        }

        #conteudo-clima .clima-atualizacao {
            font-size: 11px;
            margin-top: 5px !important;
        }

        @media (max-width: 768px) {
            .secao_clima {
                width: 95%;
                margin: 15px auto;
            }
        }
    </style>
</head>

<body>

    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <main class="main_rotas_tela_dos_trens_adm container mt-5">

        <div class="tela_inicial">
            <h1>Bem-vindo adm!</h1>
        </div>

        <!-- CLIMA -->
        <section
            id="clima"
            class="card shadow p-4 secao_clima">

            <h2>Clima da sua cidade</h2>

            <div id="conteudo-clima" class="text-center">
                Carregando informações do clima...
            </div>

        </section>
        <br>

        
        <div class="tres_colunas">

            <a class="text-decoration-none" href="tela_inicial.php">
                <button type="button" class="botao_inicial_adm justify-content-center align-items-center">

                    <div>
                        <img class="logo_botao_inicial_adm" src="../assets/img/simbolo_trem.png" alt="simbolo_trem">

                        <div class="justify-content-center">
                            <div class="mini_botao fundo_azul color-white justify-content-center">
                                <h4>TRENS</h4>
                            </div>
                        </div>
                    </div>

                </button>
            </a>

            <a class="text-decoration-none" href="visualizar_rotas.php">
                <button type="button" class="botao_inicial_adm justify-content-center align-items-center">

                    <div>
                        <img class="logo_botao_inicial_adm" src="../assets/img/simbolo_rotas.png" alt="simbolo_rotas">

                        <div class="justify-content-center">
                            <div class="mini_botao fundo_azul color-white justify-content-center">
                                <h4>ROTAS</h4>
                            </div>
                        </div>
                    </div>

                </button>
            </a>

            <a class="text-decoration-none" href="visualizar_sensores.php">
                <button type="button" class="botao_inicial_adm justify-content-center align-items-center">

                    <div>
                        <img class="logo_botao_inicial_adm" src="../assets/img/simbolo_sensores.png" alt="simbolo_sensores">

                        <div class="justify-content-center">
                            <div class="mini_botao fundo_azul color-white justify-content-center">
                                <h4>SENSORES</h4>
                            </div>
                        </div>
                    </div>

                </button>
            </a>

        </div>

        <br><br>

        
        <div class="tres_colunas">

            <a class="text-decoration-none" href="tela_dos_trens_adm.php">
                <button type="button" class="botao_inicial_adm justify-content-center align-items-center">

                    <div>
                        <img class="logo_botao_inicial_adm" src="../assets/img/simbolo_adicionar_trem.png" alt="simbolo_trem">

                        <div class="justify-content-center">
                            <div class="mini_botao fundo_azul color-white justify-content-center align-items-center">
                                <h6>ADICIONAR TRENS</h6>
                            </div>
                        </div>
                    </div>

                </button>
            </a>

            <a class="text-decoration-none" href="cadastro_rotas.php">
                <button type="button" class="botao_inicial_adm justify-content-center align-items-center">

                    <div>
                        <img class="logo_botao_inicial_adm" src="../assets/img/simbolo_adicionar_rotas.png" alt="simbolo_rotas">

                        <div class="justify-content-center">
                            <div class="mini_botao fundo_azul color-white justify-content-center">
                                <h6>ADICIONAR ROTAS</h6>
                            </div>
                        </div>
                    </div>

                </button>
            </a>

            <a class="text-decoration-none" href="cadastrar_sensor.php">
                <button type="button" class="botao_inicial_adm justify-content-center align-items-center">

                    <div>
                        <img class="logo_botao_inicial_adm" src="../assets/img/simbolo_adicionar_sensores.png" alt="simbolo_sensores">

                        <div class="justify-content-center">
                            <div class="mini_botao fundo_azul color-white justify-content-center">
                                <h6>ADICIONAR SENSORES</h6>
                            </div>
                        </div>
                    </div>

                </button>
            </a>

        </div>

        <br><br>

        
        <div class="tres_colunas">

            <div class="justify-content-center">
                <a class="text-decoration-none" href="visualizar_cadastro.php">
                    <button type="button" class="botao_inicial_adm justify-content-center align-items-center">

                        <div>
                            <img class="logo_botao_inicial_adm" src="../assets/img/simbolo_usuarios.png" alt="simbolo_usuarios">

                            <div class="justify-content-center">
                                <div class="mini_botao fundo_azul color-white justify-content-center">
                                    <h4>USUARIOS</h4>
                                </div>
                            </div>
                        </div>

                    </button>
                </a>
            </div>

            <div class="justify-content-center">
                <a class="text-decoration-none" href="adicionar_usuario.php">
                    <button type="button" class="botao_inicial_adm justify-content-center align-items-center">

                        <div>
                            <img class="logo_botao_inicial_adm" src="../assets/img/simbolo_adicionar_usuarios.png" alt="simbolo_usuarios">

                            <div class="justify-content-center">
                                <div class="mini_botao fundo_azul color-white justify-content-center">
                                    <h6>ADICIONAR USUARIOS</h6>
                                </div>
                            </div>
                        </div>

                    </button>
                </a>
            </div>

        </div>

    </main>

    <br><br><br><br><br>

    <footer>
        <?php include 'rodape.php'; ?>
    </footer>

    <script src="../scripts/links_paginas.js"></script>

</body>
</html>
