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
        <th>Telefone</th>
        <th>Senha</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Matheus Tomczak</td>
        <td>matheus.tomczak@sim.com</td>
        <td>123-456-7890</td>
        <td class="password-mask">********</td>
        <td><button class="edit-button">Editar</button></td>
        <td><button class="delete-button">Excluir</button></td>
      </tr>
      <tr>
        <td>José Daniel</td>
        <td>jose.daniel1998@messi.com</td>
        <td>098-765-4321</td>
        <td class="password-mask">******</td>
        <td><button class="edit-button">Editar</button></td>
        <td><button class="delete-button">Excluir</button></td>
      </tr>
    </tbody>
  </table>
</div>

  </div>
    


</body>

</html>