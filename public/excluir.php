<?php

include('../infra/conexao.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM usuario WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {

            header("Location: visualizar_cadastro.php");
            exit;

        } else {

            echo "Erro ao excluir o usuário.";

        }

        mysqli_stmt_close($stmt);

    } else {

        echo "Erro ao preparar a exclusão.";

    }

} else {

    echo "ID do usuário não informado.";

}

mysqli_close($conn);

?>