<?php

session_set_cookie_params(2592000);
session_start();

$cargo_sessao = $_SESSION['cargo'] ?? '';

if (isset($_SESSION['usuario_id'])) {
    if ($cargo_sessao === 'adm') {
        header('Location: public/tela_inicial_adm.php');
        exit();
    } elseif ($cargo_sessao === 'usuario') {
        header('Location: public/tela_usuario.php');
        exit();
    }else{
        header('Location: index.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/styles/styles.css">

    <title>Apresentação</title>
</head>
<body>
    <header>
        <?php
            include 'public/navbar.php';
        ?>
    </header>

    <main>

        <!-- Inicio -->

        <section class="section_apresentacao sombra_embaixo_esquerda" id="inicio">
        
            <div class="div_apresentacao">
                <img class="logo_apresentacao" src="assets/img/logo colorida fundo branco.png" alt="Logo Ferrorama">
            </div>

            <div class = "div_apresentacao fundo_azul color-white" >

                <h1>Tecnologia e inovação para um transporte ferroviário
                    mais organizado, seguro e eficiente.
                    Conheça o <b class="text-warning">Ferrorama</b> e suas funcionalidades.</h1>

            </div>

        </section>

        <!-- Sobre -->
         
        <section class="section_sobre" id="sobre">

            <div class="h-100 div_maior">
                <div class="titulo_section color-white">
                    <h1><b class = "borda_esquerda_titulo_azul p-2 text-warning">Sobre</b></h1>
                </div>

                <div class="div_sobre fundo_azul align-items-center text-center">
                    <h3> O Ferrorama é um sistema desenvolvido para auxiliar
                no gerenciamento e acompanhamento de operações ferroviárias.
                A plataforma reúne informações sobre trens, rotas e sensores,
                facilitando o acesso e a organização dos dados.</h3>
                </div>

                <div class="d-flex justify-content-end mt-3">

                    <div>

                    <div class="text-end mt-5 mb-5">
                        <h1 class="borda_direita_titulo_azul p-2">O problema que <b class="text-warning">buscamos resolver</b></h1>
                    </div>

                    <div class="div_sobre fundo_azul align-items-center text-center">
                        <h3>A falta de organização e centralização das informações ferroviárias pode dificultar o acompanhamento dos trens, o gerenciamento das rotas e o controle dos sensores. O Ferrorama busca facilitar esse processo por meio de uma plataforma centralizada.</h3>
                    </div>

                    </div>

                </div>
            </div>

        </section>


        <!-- Funcionalidades -->

        <section class="section_funcionalidades" id="funcionalidades">

            <div class="div_maior">
                <div class="titulo_section">
                    <h1 class="borda_esquerda_titulo color-white p-2">Funcionalidades</h1>
                </div>

                <div class="d-flex justify-content-between mt-5">
                    <!-- função -->
                    <div class="text-warning">

                        <div class="text-warning justify-content-center"><h2>Gerenciamento de Trens</h2></div>

                        <div class="justify-content-center">
                            <div class="div_funcao mt-5">

                            <h3>Consulte e organize as informações
                            dos trens cadastrados no sistema.</h3>

                            </div>
                        </div>
    
                    </div>


                    <!-- outra função -->
                    <div class="text-warning">

                        <div class="text-warning justify-content-center"><h2>Gerenciamento de Rotas</h2></div>

                        <div class="justify-content-center">
                            <div class="div_funcao mt-5">

                            <h3>Cadastre, visualize e organize
                        as rotas ferroviárias.</h3>

                            </div>
                        </div>
    
                    </div>

                    <!-- mais 1 -->
                    <div">
                        
                        <div class="text-warning justify-content-center"><h2>Gerenciamento de Usuários</h2></div>
                        

                        <div class="justify-content-center">
                            <div class="div_funcao mt-5">

                            <h3>Organize os cadastros e gerencie
                        os acessos à plataforma.</h3>

                            </div>
                        </div>
    
                    </div>

                </div>

            </div>

        </section>


        <!-- Benefícios -->

        <section class="section_beneficios" id="beneficios">

            <div class="div_maior">

                <div class="titulo_section">
                    <h1 class="borda_esquerda_titulo_azul text-warning p-2">Benefícios</h1>
                </div>

                <div class="d-flex escadinha">

                    <div class="w-100 justify-content-center align-items-end">
                        
                        <div>

                            <div class="justify-content-center mb-4">
                                <h3>Organização</h3>
                            </div>

                            <div class="div_escadinha">
                                <h2>Informações reunidas em um único sistema.</h2>
                            </div>
                        </div>

                    </div>

                    <div class="w-100 justify-content-center align-items-center">
                        
                        <div>

                            <div class="justify-content-center mb-4">
                                <h3>Maior Eficiência</h3>
                            </div>

                            <div class="div_escadinha">
                                <h2>Facilidade no gerenciamento das operações.</h2>
                            </div>
                        </div>

                    </div>

                    <div class="w-100 justify-content-center">
                        
                        <div>

                            <div class="justify-content-center mb-4">
                                <h3>Praticidade</h3>
                            </div>

                            <div class="div_escadinha">
                                <h2> Acesso simples às informações ferroviárias.</h2>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </section>

        <!-- Créditos -->

        <section class="creditos">

            <div>
                <div class="d-flex justify-content-center align-items-center color-white mb-2">
                    <h1>Créditos</h1>
                </div>

                <div class="d-flex justify-content-center align-items-center gap-5 mb-5">
                    
                    <div>
                        <img class="imagem_creditos" src="assets/img/programador1.jpg" alt="Caio">
                        <h5 class="justify-content-center color-white mt-2">Dono repositório</h5>
                    </div>

                    <div class="w-100">

                        <div class="justify-content-center w-100">
                            <img class="imagem_creditos justify-content-center" src="assets/img/programador2.jpg" alt="Tomczak">
                        </div>
                        
                        <h5 class="justify-content-center color-white mt-2">Grand Master Projects</h5>
                    </div>

                    <div>
                        <img class="imagem_creditos" src="assets/img/programador3.jpg" alt="Felipe">
                        <h5 class="justify-content-center color-white mt-2">Programador</h5>
                    </div>

                    <div>
                        <img class="imagem_creditos" src="assets/img/negociofeio.jpg" alt="Henrique">
                        <h5 class="justify-content-center color-white mt-2">Sei lá</h5>
                    </div>
                
                </div>

                <div class="justify-content-center mt-5">
                    <button class="botao_acessar botao_brilhante" onclick="location.href='public/login.php'">
                        <h2>Acessar Ferrorama→</h2>
                    </button>
                </div>

            </div>

        </section>


    </main>

    <footer>
        <?php
            include 'public/rodape.php';
        ?>
    </footer>
</body>
</html>