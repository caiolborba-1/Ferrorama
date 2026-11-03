<?php
require_once __DIR__ . '/proteger_adm.php';
require_once '../infra/conexao.php';

if (!isset($_GET['id']) || !ctype_digit($_GET['id'])) {
    header("Location: visualizar_cadastro.php");
    exit;
}

$id = (int) $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM usuario WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();

$usuario = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$usuario) {
    header("Location: visualizar_cadastro.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>

    <header>
        <?php include "navbar.php"; ?>
    </header>

    <main class="container py-5">

        <div class="card shadow p-4 mx-auto fundo_branco" style="max-width: 600px;">

            <h2 class="text-center mb-4">
                Editando o usuário <?= htmlspecialchars($usuario['nome_usuario']) ?>!
            </h2>

            <form action="atualizar_usuario.php" method="POST">

                <input type="hidden" name="id" value="<?= (int) $usuario['id'] ?>">

                <div class="mb-3">
                    <label for="nome_usuario" class="form-label">Nome:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="nome_usuario"
                        name="nome_usuario"
                        maxlength="100"
                        value="<?= htmlspecialchars($usuario['nome_usuario']) ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email_usuario" class="form-label">E-mail:</label>
                    <input
                        type="email"
                        class="form-control"
                        id="email_usuario"
                        name="email_usuario"
                        value="<?= htmlspecialchars($usuario['email_usuario']) ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label for="senha_usuario" class="form-label">Nova senha:</label>
                    <input
                        type="password"
                        class="form-control"
                        id="senha_usuario"
                        name="senha_usuario"
                        placeholder="Deixe vazio para manter a senha atual">
                </div>

                <hr>

                <h5 class="mb-3">Endereço do usuário</h5>

                <div class="mb-3">
                    <label for="cep_usuario" class="form-label">CEP:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="cep_usuario"
                        name="cep_usuario"
                        maxlength="9"
                        placeholder="00000-000"
                        value="<?= htmlspecialchars($usuario['cep_usuario'] ?? '') ?>"
                        required>
                    <small id="mensagem_cep" class="text-muted">
                        Digite o CEP para preencher o endereço automaticamente.
                    </small>
                </div>

                <div class="mb-3">
                    <label for="logradouro_usuario" class="form-label">Logradouro:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="logradouro_usuario"
                        name="logradouro_usuario"
                        maxlength="150"
                        value="<?= htmlspecialchars($usuario['logradouro_usuario'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="bairro_usuario" class="form-label">Bairro:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="bairro_usuario"
                        name="bairro_usuario"
                        maxlength="100"
                        value="<?= htmlspecialchars($usuario['bairro_usuario'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="cidade_usuario" class="form-label">Cidade:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="cidade_usuario"
                        name="cidade_usuario"
                        maxlength="100"
                        value="<?= htmlspecialchars($usuario['cidade_usuario'] ?? '') ?>">
                </div>

                <div class="mb-3">
                    <label for="uf_usuario" class="form-label">UF:</label>
                    <input
                        type="text"
                        class="form-control"
                        id="uf_usuario"
                        name="uf_usuario"
                        maxlength="2"
                        value="<?= htmlspecialchars($usuario['uf_usuario'] ?? '') ?>">
                </div>

                <hr>

                <div class="mb-4">
                    <label for="cargo" class="form-label">Cargo:</label>
                    <select class="form-select" name="cargo" id="cargo" required>
                        <option value="usuario" <?= $usuario['cargo'] === 'usuario' ? 'selected' : '' ?>>
                            Usuário
                        </option>

                        <option value="adm" <?= $usuario['cargo'] === 'adm' ? 'selected' : '' ?>>
                            Administrador
                        </option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        Atualizar
                    </button>

                    <a href="visualizar_cadastro.php" class="btn btn-secondary w-100">
                        Voltar
                    </a>
                </div>

            </form>
        </div>

    </main>

    <script>
        const campoCep = document.getElementById('cep_usuario');
        const campoLogradouro = document.getElementById('logradouro_usuario');
        const campoBairro = document.getElementById('bairro_usuario');
        const campoCidade = document.getElementById('cidade_usuario');
        const campoUf = document.getElementById('uf_usuario');
        const mensagemCep = document.getElementById('mensagem_cep');

        campoCep.addEventListener('input', function () {
            let cep = this.value.replace(/\D/g, '');

            if (cep.length > 8) {
                cep = cep.substring(0, 8);
            }

            if (cep.length > 5) {
                this.value = cep.substring(0, 5) + '-' + cep.substring(5);
            } else {
                this.value = cep;
            }
        });

        campoCep.addEventListener('blur', consultarCep);

        async function consultarCep() {
            const cep = campoCep.value.replace(/\D/g, '');

            if (cep.length === 0) {
                mensagemCep.textContent = 'Digite o CEP para preencher o endereço automaticamente.';
                return;
            }

            if (cep.length !== 8) {
                mensagemCep.textContent = 'Digite um CEP válido com 8 números.';
                mensagemCep.className = 'text-danger';
                return;
            }

            mensagemCep.textContent = 'Consultando CEP...';
            mensagemCep.className = 'text-muted';

            try {
                const resposta = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                const dados = await resposta.json();

                if (dados.erro) {
                    mensagemCep.textContent = 'CEP não encontrado.';
                    mensagemCep.className = 'text-danger';
                    return;
                }

                campoLogradouro.value = dados.logradouro || '';
                campoBairro.value = dados.bairro || '';
                campoCidade.value = dados.localidade || '';
                campoUf.value = dados.uf || '';

                mensagemCep.textContent = 'Endereço preenchido com sucesso!';
                mensagemCep.className = 'text-success';

            } catch (erro) {
                mensagemCep.textContent = 'Não foi possível consultar o CEP. Tente novamente.';
                mensagemCep.className = 'text-danger';
            }
        }
    </script>

</body>
</html>