<?php
    session_start();
    //vai ter que puxar  id para fazer a query que puxa a tabela correspondente a aquele id.

    $sql = "SELECT * FROM usuarios WHERE id = $id"
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../assets/styles/styles.css">
</head>

<header class="position-absolute">
    <?php
    include "navbar.php"
    ?>
</header>

<body class="">

    <div class="pad display_flex justify-content-center">
        <h1>Perfil de Usuario</h1>
    </div>
    <div class="A">

        
        <img src="../assets/img/zuka.png" alt="" class="br">
        
            
        <div>
        <?php while ($usuario = $resultado->fetch_assoc()) { ?>

            <h1>Nome: <?php echo htmlspecialchars($usuario ['nome_usuario'])?></h1>
            <h1>E-mail: <?php echo htmlspecialchars($usuario ['email_usuario'])?></h1>
            <h1>Senha: <?php echo htmlspecialchars($usuario ['senha_usuario'])?></h1>
                        
        <?php } ?>
        </div>

    </div>
        
</body>
</html>