<?php
 include "infra/conexao.php";

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "ferrorama";
    $conn = mysqli_connect($host, $user, $password, $database);


    $sql = "INSERT INTO usuario(nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("ssss", $nome, $email, $senha, $telefone);
    
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar usuário: " . $stmt->error;
    }


    

?>