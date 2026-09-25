<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "ferrorama";
    $conn = mysqli_connect($host, $user, $password, $database);


    $sql = "INSERT INTO usuario(nome, email, senha, telefone) VALUES (?, ?, ?, ?)";

?>