
<?php include ('../infra/conexao.php');

$sql = "SELECT * FROM usuario";

$resultado = mysqli_query($conn, $sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/relogio_navbar.js"></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <title>Visualização de Cadastros</title>
</head>

<body class="justify-content-center align-items-center">

    <header class="position-absolute"> <?php include "navbar_adm.php"; ?> </header>

  <div class="justify-content-center align-items-center">

    <div class="card-container">
  <h1>Usuários Cadastrados</h1>




  <table class="custom-table">
    <thead>
      <tr>
        <th>Nome de Usuário</th>
        <th>E-mail</th>
       
        <th>Senha</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($usuario = $resultado->fetch_assoc()) {?>
      <tr>
        <td><?php echo htmlspecialchars($usuario ['nome_usuario'])?></td>
        <td><?php echo htmlspecialchars($usuario['email_usuario'])?></td>
       
        <td class="password-mask">******</td>
        <td>
            <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>" class="btn btn-primary">Editar</a>
        </td>

<td>
    <a 
        href="excluir.php?id=<?php echo $usuario['id']; ?>" class="delete-button"  
        onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir
    </a>
</td>

      </tr>
      <?php } ?>
    </tbody>

  </table>
</div>

  </div>
    


</body>

</html>