
<?php include ('../infra/conexao.php');

$sql = "SELECT * FROM rotas";

$resultado = mysqli_query($conn, $sql);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/relogio_navbar.js"></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <title>Visualização de Rotas</title>
</head>

<body class="justify-content-center align-items-center">

    <header class="position-absolute"> <?php include "navbar.php"; ?> </header>

  <div class="justify-content-center align-items-center">

    <div class="card-container">

  <h1>Rotas Cadastradas</h1>
  <table class="custom-table">
    <thead>
      <tr>
        <th>Nome da Rota</th>
        <th>Descrição</th>
        <th>Distância</th>
        <th>Trem Vinculado</th>    
        <th>Tempo</th>
        <th>Data de Criação</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>

    <tbody>
      <?php while ($rotas = $resultado->fetch_assoc()) {?>
      <tr>
        <td><?php echo htmlspecialchars($rotas ['nome_rota'])?></td>
        <td><?php echo htmlspecialchars($rotas['descricao_rota'])?></td>
        <td><?php echo htmlspecialchars($rotas['distancia_rota'])?></td>
        <td><?php echo htmlspecialchars($rotas['trem_rota'])?></td>
        <td><?php echo htmlspecialchars($rotas['duracao_rota'])?></td>
        <td><?php echo htmlspecialchars($rotas['data_criacao'])?></td>

        <td>
            <a href="editar_rotas.php?id=<?php echo $rotas['id']; ?>" class="btn btn-primary">Editar</a>
        </td>

        <td>
            <a href="excluir_rotas.php?id=<?php echo $rotas['id']; ?>" class="delete-button"  onclick="return confirm('Tem certeza que deseja excluir esta rota?');">Excluir</a>
        </td>

      </tr>
      <?php } ?>
    </tbody>

  </table>
</div>

  </div>
    


</body>

</html>