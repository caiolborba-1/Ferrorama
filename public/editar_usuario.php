
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
    <title>Editando Usuário</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>

    <header>
        <?php include "navbar.php"; ?>
    </header>

    
    <main class="container py-5">

        <br><br><br>

        <div class="card shadow p-4 mx-auto fundo_preto borda-animada" style="max-width: 500px;">

            <h2 class="text-center mb-4">
                Editando o usuário <?= htmlspecialchars($usuario['nome_usuario']) ?>!
            </h2>

            <form action="atualizar_usuario.php" method="POST">

                <input
                    type="hidden"
                    name="id"
                    value="<?= (int) $usuario['id'] ?>"
                >

                <div class="mb-3">
                    <label for="nome_usuario" class="form-label">
                        Nome de Usuário:
                    </label>

                    <input
                        type="text"
                        id="nome_usuario"
                        name="nome_usuario"
                        class="form-control"
                        value="<?= htmlspecialchars($usuario['nome_usuario']) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="email_usuario" class="form-label">
                        E-mail:
                    </label>

                    <input
                        type="email"
                        id="email_usuario"
                        name="email_usuario"
                        class="form-control"
                        value="<?= htmlspecialchars($usuario['email_usuario']) ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="senha_usuario" class="form-label">
                        Nova senha:
                    </label>

                    <input
                        type="password"
                        id="senha_usuario"
                        name="senha_usuario"
                        class="form-control"
                        placeholder="Deixe vazio para manter a senha atual"
                        autocomplete="new-password"
                    >
                </div>

                <div class="mb-3">
                    <label for="cargo" class="form-label">
                        Cargo:
                    </label>

                    <select id="cargo" name="cargo" class="form-select" required>
                        <option value="usuario" <?= $usuario['cargo'] === 'usuario' ? 'selected' : '' ?>>
                            Usuário
                        </option>

                        <option value="adm" <?= $usuario['cargo'] === 'adm' ? 'selected' : '' ?>>
                            Administrador
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn botao_brilhante cor_amarela color-white w-100">
                    Atualizar
                </button>

                <a href="visualizar_cadastro.php" class="btn botao_brilhante cor_cinza color-white w-100 mt-2">
                    Voltar
                </a>

            </form>
        </div>
    </main>

</body>
</html>
