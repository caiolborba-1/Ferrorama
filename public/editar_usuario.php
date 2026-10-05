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
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<body>
    <header>
        
       <?php include "navbar_adm.php"; ?>

    </header>
    <main class="justify-content-center tela_inteira">
        
        <div>
            <h2>Editando o usuario <?php echo $usuario["nome_usuario"]?>!</h2>
                <form action="atualizar_usuario.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $usuario["id"]?>">

                    <label for="nome_usuario">Nome de Usuário:</label>
                    <input type="text" name="nome_usuario" value="<?php echo $usuario["nome_usuario"]?>">
                    <br>
                    <label for="email_usuario">E-mail:</label>
                    <input type="email" name="email_usuario" value="<?php echo $usuario["email_usuario"]?>">
                    <br>
                    <label for="senha_usuario">Senha:</label>
                    <input type="password" name="senha_usuario" value="<?php echo $usuario["senha_usuario"]?>">
                    <br>
                    <button type="submit">Atualizar</button>
                </form>
        </div>

    </main>

</body>

</html>