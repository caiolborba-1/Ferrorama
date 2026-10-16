<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center padding-top: 50px;">
        <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
            <h2>Cadastre uma rota</h2>
                <form action="public/cadastrar.php" method="POST">
                    <label for="titulo">Nome da rota:</label>
                    <input type="text" name="titulo">
                    <br>
                    <textarea name="descricao" ows="5" cols="33">Descrição</textarea>
                    <br>
                    <select name="tremAlocado" placeholder="Tipo">
                        <option value="">Selecione o Trem alocado</option>
                        <option value="trem1">Trem 1</option>
                        <option value="trem2">Trem 2</option>
                        <option value="trem3">Trem 3</option>
                        <option value="trem4">Trem 4</option>
                    </select>
                    <br>
                    <label for="">Duração</label>
                    <input type="text" name="duracao">
                    <button type="submit">Cadastrar</button>
                </form>
                <div>
                    <h2>Livros Cadastrados</h2>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Ano</th>
                            <th>Ações</th>
                        </tr>
                        <?php while ($ = mysqli_fetch_assoc($)) { ?>
                            <tr>
                                <td><?php echo $["id"] ?></td>
                                <td><?php echo $["titulo"] ?></td>
                                <td><?php echo $["autor"] ?></td>
                                <td><?php echo $["ano"] ?></td>
                                <td>
                                    <a href="public/editar.php?id=<?php echo $["id"] ?>">Editar</a>
                                    <a href="public/excluir.php?id=<?php echo $["id"] ?>">Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
    </div>
</body>
</html>