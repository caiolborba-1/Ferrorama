
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Ferrorama | Monitoramento Ferroviário</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background-color: #07152b;
            color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* NAVBAR */

        .cabecalho {
            width: 100%;
            min-height: 75px;
            padding: 12px 4%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #061126;
            border-bottom: 1px solid #203b62;
        }

        .logo {
            width: 210px;
            max-width: 100%;
        }

        .navegacao {
            display: flex;
            align-items: center;
            gap: 35px;
        }

        .navegacao a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 0;
            transition: 0.3s;
        }

        .navegacao a:hover {
            color: #ffbd00;
        }

        .botao_acessar {
            background-color: #ffbd00;
            color: #07152b;
            padding: 12px 22px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            white-space: nowrap;
        }

        .botao_acessar:hover,
        .botao_amarelo:hover {
            background-color: #e5a900;
            color: #07152b;
            transform: translateY(-2px);
        }

        /* APRESENTAÇÃO */

        main {
            width: 100%;
            padding: 30px 4%;
        }

        .apresentacao {
            background-color: #091a35;
            border: 1px solid #24436c;
            border-radius: 18px;
            min-height: 290px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 45px 20px;
            margin-bottom: 25px;
        }

        .apresentacao h1 {
            font-size: 55px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .apresentacao h2 {
            color: #ffbd00;
            font-size: 27px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .apresentacao p {
            font-size: 18px;
            max-width: 650px;
            line-height: 1.6;
            color: #e0e7f1;
            margin-bottom: 25px;
        }

        .botao_amarelo {
            display: inline-block;
            background-color: #ffbd00;
            color: #07152b;
            text-decoration: none;
            font-weight: bold;
            padding: 13px 28px;
            border-radius: 30px;
            transition: 0.3s;
        }

        /* SEÇÕES */

        .secao {
            background-color: #091a35;
            border: 1px solid #24436c;
            border-radius: 18px;
            padding: 25px;
            margin-bottom: 25px;
        }

        .titulo_secao {
            font-size: 29px;
            font-weight: bold;
            border-left: 6px solid #ffbd00;
            padding-left: 15px;
            margin-bottom: 18px;
        }

        .texto_secao {
            color: #e0e7f1;
            font-size: 17px;
            line-height: 1.7;
            margin-bottom: 0;
            padding-left: 21px;
        }

        /* FUNCIONALIDADES */

        .grade_funcionalidades {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
        }

        .card_funcionalidade {
            background-color: #0d203e;
            border: 1px solid #24436c;
            border-radius: 15px;
            padding: 25px 15px;
            text-align: center;
            transition: 0.3s;
        }

        .card_funcionalidade:hover {
            border-color: #ffbd00;
            transform: translateY(-4px);
        }

        .numero_funcionalidade {
            color: #ffbd00;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .card_funcionalidade h4 {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        .card_funcionalidade p {
            color: #d5deeb;
            font-size: 15px;
            margin-bottom: 0;
            line-height: 1.5;
        }

        /* BENEFÍCIOS */

        .grade_beneficios {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .beneficio {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border-right: 1px solid #24436c;
        }

        .beneficio:last-child {
            border-right: none;
        }

        .beneficio_numero {
            color: #ffbd00;
            font-size: 32px;
            font-weight: bold;
        }

        .beneficio h4 {
            font-size: 18px;
            font-weight: bold;
        }

        .beneficio p {
            color: #d5deeb;
            font-size: 14px;
            margin-bottom: 0;
        }

        /* CHAMADA FINAL */

        .chamada_final {
            background-color: #091a35;
            border: 1px solid #24436c;
            border-radius: 18px;
            padding: 30px 35px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .chamada_final h2 {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .chamada_final p {
            color: #d5deeb;
            margin-bottom: 0;
        }

        /* RODAPÉ */

        footer {
            background-color: #061126;
            border-top: 1px solid #24436c;
            padding: 25px 4%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        footer img {
            width: 190px;
        }

        footer p {
            color: #d5deeb;
            margin: 0;
            text-align: center;
        }

        .direitos {
            font-size: 12px;
        }

        /* RESPONSIVIDADE */

        @media (max-width: 900px) {
            .cabecalho {
                flex-wrap: wrap;
                justify-content: center;
                gap: 18px;
            }

            .navegacao {
                gap: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .grade_funcionalidades {
                grid-template-columns: repeat(2, 1fr);
            }

            .grade_beneficios {
                grid-template-columns: 1fr;
            }

            .beneficio {
                border-right: none;
                border-bottom: 1px solid #24436c;
            }

            .beneficio:last-child {
                border-bottom: none;
            }
        }

        @media (max-width: 600px) {
            main {
                padding: 20px 4%;
            }

            .apresentacao h1 {
                font-size: 40px;
            }

            .apresentacao h2 {
                font-size: 21px;
            }

            .apresentacao p {
                font-size: 16px;
            }

            .titulo_secao {
                font-size: 23px;
            }

            .grade_funcionalidades {
                grid-template-columns: 1fr;
            }

            .chamada_final {
                flex-direction: column;
                align-items: flex-start;
            }

            footer {
                flex-direction: column;
                text-align: center;
            }

            .navegacao {
                gap: 15px;
                font-size: 14px;
            }

            .logo {
                width: 180px;
            }
        }
    </style>
</head>

<body>

    <!-- CABEÇALHO -->

    <header class="cabecalho">

        <a href="index.php">
            <img src="assets/img/nova_logo_texto.png" alt="Logo Ferrorama" class="logo">
        </a>

        <nav class="navegacao">
            <a href="#inicio">Início</a>
            <a href="#sobre">Sobre</a>
            <a href="#funcionalidades">Funcionalidades</a>
            <a href="#beneficios">Benefícios</a>
        </nav>

        <a href="public/login.php" class="botao_acessar">
            Acessar Sistema →
        </a>

    </header>

    <main>

        <!-- APRESENTAÇÃO -->

        <section class="apresentacao" id="inicio">

            <h1>Ferrorama</h1>

            <h2>Monitoramento ferroviário inteligente</h2>

            <p>
                Tecnologia e inovação para um transporte ferroviário
                mais organizado, seguro e eficiente.
                Conheça o Ferrorama e suas funcionalidades.
            </p>

            <a href="#funcionalidades" class="botao_amarelo">
                Conheça o Sistema →
            </a>

        </section>

        <!-- SOBRE O PROJETO -->

        <section class="secao" id="sobre">

            <h2 class="titulo_secao">Sobre o Ferrorama</h2>

            <p class="texto_secao">
                O Ferrorama é um sistema desenvolvido para auxiliar
                no gerenciamento e acompanhamento de operações ferroviárias.
                A plataforma reúne informações sobre trens, rotas e sensores,
                facilitando o acesso e a organização dos dados.
            </p>

        </section>

        <!-- PROBLEMA -->

        <section class="secao">

            <h2 class="titulo_secao">O Problema</h2>

            <p class="texto_secao">
                A falta de organização e centralização das informações
                ferroviárias pode dificultar o acompanhamento dos trens,
                o gerenciamento das rotas e o controle dos sensores.
                O Ferrorama busca facilitar esse processo por meio de
                uma plataforma centralizada.
            </p>

        </section>

        <!-- FUNCIONALIDADES -->

        <section class="secao" id="funcionalidades">

            <h2 class="titulo_secao">Principais Funcionalidades</h2>

            <div class="grade_funcionalidades">

                <div class="card_funcionalidade">
                    <div class="numero_funcionalidade">01</div>
                    <h4>Gerenciamento de Trens</h4>
                    <p>
                        Consulte e organize as informações
                        dos trens cadastrados no sistema.
                    </p>
                </div>

                <div class="card_funcionalidade">
                    <div class="numero_funcionalidade">02</div>
                    <h4>Gerenciamento de Rotas</h4>
                    <p>
                        Cadastre, visualize e organize
                        as rotas ferroviárias.
                    </p>
                </div>

                <div class="card_funcionalidade">
                    <div class="numero_funcionalidade">03</div>
                    <h4>Controle de Sensores</h4>
                    <p>
                        Consulte e gerencie os sensores
                        cadastrados e suas informações.
                    </p>
                </div>

                <div class="card_funcionalidade">
                    <div class="numero_funcionalidade">04</div>
                    <h4>Gerenciamento de Usuários</h4>
                    <p>
                        Organize os cadastros e gerencie
                        os acessos à plataforma.
                    </p>
                </div>

            </div>

        </section>

        <!-- BENEFÍCIOS -->

        <section class="secao" id="beneficios">

            <h2 class="titulo_secao">Benefícios</h2>

            <div class="grade_beneficios">

                <div class="beneficio">
                    <div class="beneficio_numero">01</div>
                    <div>
                        <h4>Mais Organização</h4>
                        <p>
                            Informações reunidas em um único sistema.
                        </p>
                    </div>
                </div>

                <div class="beneficio">
                    <div class="beneficio_numero">02</div>
                    <div>
                        <h4>Maior Eficiência</h4>
                        <p>
                            Facilidade no gerenciamento das operações.
                        </p>
                    </div>
                </div>

                <div class="beneficio">
                    <div class="beneficio_numero">03</div>
                    <div>
                        <h4>Praticidade</h4>
                        <p>
                            Acesso simples às informações ferroviárias.
                        </p>
                    </div>
                </div>

            </div>

        </section>

        <!-- CHAMADA PARA ACESSAR -->

        <section class="chamada_final">

            <div>
                <h2>Conheça o sistema Ferrorama!</h2>

                <p>
                    Acesse a plataforma e descubra nossas funcionalidades.
                </p>
            </div>

            <a href="public/login.php" class="botao_amarelo">
                Acessar Sistema →
            </a>

        </section>

    </main>

    <!-- RODAPÉ -->

    <footer>

        <img src="assets/img/nova_logo_texto.png" alt="Logo Ferrorama">

        <p>
            Tecnologia e inovação para o transporte ferroviário.
        </p>

        <p class="direitos">
            © 2026 Ferrorama. Todos os direitos reservados.
        </p>

    </footer>

</body>
</html>
