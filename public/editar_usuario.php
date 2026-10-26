<?php

include ('../infra/conexao.php');


$id = $_GET["id"];
$sql = "SELECT * FROM usuario WHERE id = $id";
$resultado = mysqli_query($conn, $sql );

$usuario =mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="en">

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
        
        <div class="card shadow p-4 mx-auto" style="max-width: 500px;">
            <h2 class="text-center mb-4">Editando o usuario <?php echo $usuario["nome_usuario"]?>!</h2>
                <form action="atualizar_usuario.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $usuario["id"]?>">

                    <div class="mb-3">
                        <label for="nome_usuario" class="form-label">Nome de Usuário:</label>
                        <input type="text" name="nome_usuario" class="form-control" value="<?php echo $usuario["nome_usuario"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="email_usuario" class="form-label">E-mail:</label>
                        <input type="email" name="email_usuario" class="form-control" value="<?php echo $usuario["email_usuario"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="senha_usuario" class="form-label">Senha:</label>
                        <input type="password" name="senha_usuario" class="form-control" value="<?php echo $usuario["senha_usuario"]?>">
                    </div>
                    <div class="mb-3">
                        <label for="cargo" class="form-label">Cargo:</label>
                        <select name="cargo" class="form-control">
                            <option value="usuario" <?php echo ($usuario["cargo"] == 'usuario') ? 'selected' : ''; ?>>Usuário</option>
                            <option value="adm" <?php echo ($usuario["cargo"] == 'adm') ? 'selected' : ''; ?>>Administrador</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Atualizar</button>
                </form>
        </div>

    </main>

</body>

</html>