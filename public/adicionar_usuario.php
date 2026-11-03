
<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

$mensagem = '';

$nome_usuario = '';
$email_usuario = '';
$cep_usuario = '';

function consultarCEP($cep)
{
    $url = "https://viacep.com.br/ws/" . $cep . "/json/";

    if (function_exists('curl_init')) {
        $curl = curl_init($url);

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_SSL_VERIFYPEER => true
        ]);

        $resposta = curl_exec($curl);
        $erro = curl_errno($curl);

        curl_close($curl);

        if ($erro !== 0 || $resposta === false) {
            return false;
        }
    } else {
        $contexto = stream_context_create([
            'http' => [
                'timeout' => 10
            ]
        ]);

        $resposta = @file_get_contents($url, false, $contexto);

        if ($resposta === false) {
            return false;
        }
    }

    $dados = json_decode($resposta, true);

    if (!is_array($dados)) {
        return false;
    }

    if (isset($dados['erro']) && $dados['erro'] === true) {
        return null;
    }

    return $dados;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome_usuario = trim($_POST['nome_usuario'] ?? '');
    $email_usuario = trim($_POST['email_usuario'] ?? '');
    $senha_usuario = $_POST['senha_usuario'] ?? '';
    $cep_usuario = preg_replace('/\D/', '', $_POST['cep_usuario'] ?? '');

    if (
        $nome_usuario === '' ||
        $email_usuario === '' ||
        $senha_usuario === '' ||
        $cep_usuario === ''
    ) {
        $mensagem = 'Preencha todos os campos.';
    } elseif (!filter_var($email_usuario, FILTER_VALIDATE_EMAIL)) {
        $mensagem = 'Informe um e-mail válido.';
    } elseif (strlen($cep_usuario) !== 8) {
        $mensagem = 'Informe um CEP válido com 8 números.';
    } else {

        $endereco = consultarCEP($cep_usuario);

        if ($endereco === false) {
            $mensagem = 'Não foi possível conectar à API ViaCEP. Tente novamente.';
        } elseif ($endereco === null) {
            $mensagem = 'CEP não encontrado. Verifique o número informado.';
        } else {

            $cep = $endereco['cep'];
            $logradouro = $endereco['logradouro'];
            $bairro = $endereco['bairro'];
            $cidade = $endereco['localidade'];
            $uf = $endereco['uf'];

            $verificar = $conn->prepare(
                'SELECT id FROM usuario WHERE email_usuario = ?'
            );

            if (!$verificar) {
                $mensagem = 'Erro ao verificar o e-mail.';
            } else {

                $verificar->bind_param('s', $email_usuario);
                $verificar->execute();

                $resultado = $verificar->get_result();

                if ($resultado->num_rows > 0) {
                    $mensagem = 'Este e-mail já está cadastrado!';
                } else {

                    $senha_hash = password_hash(
                        $senha_usuario,
                        PASSWORD_DEFAULT
                    );

                    $cargo = 'usuario';

                    $sql = "INSERT INTO usuario (
                        nome_usuario,
                        email_usuario,
                        senha_usuario,
                        cargo,
                        cep_usuario,
                        logradouro_usuario,
                        bairro_usuario,
                        cidade_usuario,
                        uf_usuario
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    $stmt = $conn->prepare($sql);

                    if (!$stmt) {
                        $mensagem = 'Erro ao preparar o cadastro.';
                    } else {

                        $stmt->bind_param(
                            'sssssssss',
                            $nome_usuario,
                            $email_usuario,
                            $senha_hash,
                            $cargo,
                            $cep,
                            $logradouro,
                            $bairro,
                            $cidade,
                            $uf
                        );

                        if ($stmt->execute()) {

                            $_SESSION['sucesso_cadastro'] =
                                'Usuário cadastrado com sucesso!';

                            header('Location: adicionar_usuario.php');
                            exit();

                        } else {
                            $mensagem = 'Erro ao cadastrar usuário.';
                        }

                        $stmt->close();
                    }
                }

                $verificar->close();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Adicionar Usuário - Ferrorama</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>

    <?php include 'navbar.php'; ?>

    <main class="container py-5">

        <div class="card shadow p-4 mx-auto fundo_branco"
             style="width: 100%; max-width: 550px;">

            <h3 class="text-center mb-4" id="titulo">
                Adição de Usuário
            </h3>

            <form action="" method="POST" id="form-cadastro">

                <div class="mb-3">
                    <label for="nome_usuario" class="form-label">
                        Nome de Usuário
                    </label>

                    <input
                        type="text"
                        id="nome_usuario"
                        name="nome_usuario"
                        class="form-control"
                        placeholder="Digite o nome"
                        maxlength="100"
                        value="<?= htmlspecialchars($nome_usuario) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="email_usuario" class="form-label">
                        E-mail
                    </label>

                    <input
                        type="email"
                        id="email_usuario"
                        name="email_usuario"
                        class="form-control"
                        placeholder="Digite o e-mail"
                        maxlength="100"
                        value="<?= htmlspecialchars($email_usuario) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="senha_usuario" class="form-label">
                        Senha
                    </label>

                    <input
                        type="password"
                        id="senha_usuario"
                        name="senha_usuario"
                        class="form-control"
                        placeholder="Digite a senha"
                        required
                    >
                </div>

                <hr>

                <h5 class="mb-3">Endereço do Usuário</h5>

                <div class="mb-3">
                    <label for="cep_usuario" class="form-label">
                        CEP
                    </label>

                    <input
                        type="text"
                        id="cep_usuario"
                        name="cep_usuario"
                        class="form-control"
                        placeholder="00000-000"
                        maxlength="9"
                        inputmode="numeric"
                        value="<?= htmlspecialchars($cep_usuario) ?>"
                        required
                    >

                    <small class="text-muted">
                        Digite o CEP para preencher o endereço automaticamente.
                    </small>

                    <div id="mensagem-cep" class="mt-2"></div>
                </div>

                <div class="mb-3">
                    <label for="logradouro_usuario" class="form-label">
                        Logradouro
                    </label>

                    <input
                        type="text"
                        id="logradouro_usuario"
                        class="form-control"
                        placeholder="Rua ou avenida"
                        readonly
                    >
                </div>

                <div class="mb-3">
                    <label for="bairro_usuario" class="form-label">
                        Bairro
                    </label>

                    <input
                        type="text"
                        id="bairro_usuario"
                        class="form-control"
                        placeholder="Bairro"
                        readonly
                    >
                </div>

                <div class="row">

                    <div class="col-md-8 mb-3">
                        <label for="cidade_usuario" class="form-label">
                            Cidade
                        </label>

                        <input
                            type="text"
                            id="cidade_usuario"
                            class="form-control"
                            placeholder="Cidade"
                            readonly
                        >
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="uf_usuario" class="form-label">
                            Estado (UF)
                        </label>

                        <input
                            type="text"
                            id="uf_usuario"
                            class="form-control"
                            placeholder="UF"
                            readonly
                        >
                    </div>

                </div>

                <button
                    type="submit"
                    class="btn botao_brilhante fundo_azul color-white w-100"
                    id="botao-cadastrar"
                >
                    Cadastrar Usuário
                </button>

            </form>

            <?php if (isset($_SESSION['sucesso_cadastro'])): ?>

                <div class="alert alert-success text-center mt-3">
                    <?= htmlspecialchars($_SESSION['sucesso_cadastro']) ?>
                </div>

                <?php unset($_SESSION['sucesso_cadastro']); ?>

            <?php endif; ?>

            <?php if ($mensagem !== ''): ?>

                <div class="alert alert-danger text-center mt-3">
                    <?= htmlspecialchars($mensagem) ?>
                </div>

            <?php endif; ?>

        </div>

    </main>

    <script>
        const campoCEP = document.getElementById('cep_usuario');
        const campoLogradouro = document.getElementById('logradouro_usuario');
        const campoBairro = document.getElementById('bairro_usuario');
        const campoCidade = document.getElementById('cidade_usuario');
        const campoUF = document.getElementById('uf_usuario');
        const mensagemCEP = document.getElementById('mensagem-cep');
        const botaoCadastrar = document.getElementById('botao-cadastrar');

        let cepValido = false;
        let consultaAtual = 0;

        function limparEndereco() {
            campoLogradouro.value = '';
            campoBairro.value = '';
            campoCidade.value = '';
            campoUF.value = '';
            cepValido = false;
        }

        function mostrarMensagem(texto, tipo) {
            mensagemCEP.innerHTML = '';

            const alerta = document.createElement('div');
            alerta.className = 'alert alert-' + tipo + ' py-2 mb-0';
            alerta.textContent = texto;

            mensagemCEP.appendChild(alerta);
        }

        async function buscarCEP() {
            const cep = campoCEP.value.replace(/\D/g, '');
            const identificador = ++consultaAtual;

            limparEndereco();
            mensagemCEP.innerHTML = '';

            if (cep.length === 0) {
                return;
            }

            if (cep.length !== 8) {
                mostrarMensagem('Digite um CEP com 8 números.', 'warning');
                return;
            }

            campoCEP.value = cep.replace(/(\d{5})(\d{3})/, '$1-$2');

            mostrarMensagem('Consultando ViaCEP...', 'info');

            try {
                const resposta = await fetch(
                    'https://viacep.com.br/ws/' + cep + '/json/'
                );

                if (!resposta.ok) {
                    throw new Error('Falha na comunicação.');
                }

                const dados = await resposta.json();

                if (identificador !== consultaAtual) {
                    return;
                }

                if (dados.erro) {
                    limparEndereco();
                    mostrarMensagem('CEP não encontrado!', 'danger');
                    return;
                }

                campoLogradouro.value = dados.logradouro || '';
                campoBairro.value = dados.bairro || '';
                campoCidade.value = dados.localidade || '';
                campoUF.value = dados.uf || '';

                cepValido = true;

                mostrarMensagem('Endereço encontrado com sucesso!', 'success');

            } catch (erro) {
                if (identificador !== consultaAtual) {
                    return;
                }

                limparEndereco();

                mostrarMensagem(
                    'Não foi possível consultar o CEP. Verifique sua conexão e tente novamente.',
                    'danger'
                );
            }
        }

        campoCEP.addEventListener('blur', buscarCEP);

        campoCEP.addEventListener('input', function () {
            const numeros = this.value.replace(/\D/g, '').slice(0, 8);

            this.value = numeros.replace(/(\d{5})(\d{1,3})/, '$1-$2');

            limparEndereco();
            mensagemCEP.innerHTML = '';

            if (numeros.length === 8) {
                buscarCEP();
            }
        });

        document.getElementById('form-cadastro').addEventListener('submit', function (evento) {
            const cep = campoCEP.value.replace(/\D/g, '');

            if (cep.length !== 8 || !cepValido) {
                evento.preventDefault();

                mostrarMensagem(
                    'Consulte um CEP válido antes de cadastrar o usuário.',
                    'danger'
                );

                campoCEP.focus();
            }
        });
    </script>

</body>
</html>
