<?php include ('../infra/conexao.php');

$sql = "SELECT * FROM trens";

$resultado = mysqli_query($conn, $sql);
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../scripts/relogio_navbar.js"></script>
    <link rel="stylesheet" href="../assets/styles/styles.css">
    <title>Visualização de Trens Cadastrados</title>
</head>

<body class="justify-content-center align-items-center">

    <header class="position-absolute"> <?php include "navbar.php"; ?> </header>

  <div class="justify-content-center align-items-center">

    <div class="card-container">
  <h1>Trens Cadastrados</h1>

  <table class="custom-table">
    <thead>
      <tr>
        <th>Nome do Trem</th>
        <th>Destino</th>
        <th>Horário de Partida</th>
        <th>Horário de Chegada</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($trem = $resultado->fetch_assoc()) { ?>
      <tr>
        <td><?php echo htmlspecialchars($trem['nome_trem']); ?></td>
        <td><?php echo htmlspecialchars($trem['destino_trem']); ?></td>
        <td><?php echo htmlspecialchars($trem['horario_partida']); ?></td>
        <td><?php echo htmlspecialchars($trem['horario_chegada']); ?></td>
        <td>
            <a href="editar_trem.php?id=<?php echo $trem['id']; ?>" class="btn btn-primary">Editar</a>
        </td>
        <td>
            <a 
                href="excluir_trem.php?id=<?php echo $trem['id']; ?>" class="delete-button"  
                onclick="return confirm('Tem certeza que deseja excluir este trem?');">Excluir
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