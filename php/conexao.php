<?php 
    $conn = new mysqli("localhost", "root", "", "agenda");

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
?>