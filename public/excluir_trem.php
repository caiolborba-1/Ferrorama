<?php

include('../infra/conexao.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM trens WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {

            header("Location: visualizar_trem_cadastrado.php");
            exit;

        } else {

            echo "Erro ao excluir o trem.";

        }

        mysqli_stmt_close($stmt);

    } else {

        echo "Erro ao preparar a exclusão.";

    }

} else {

    echo "ID do trem não informado.";

}

mysqli_close($conn);

?>