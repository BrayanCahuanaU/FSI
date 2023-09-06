<?php
    // Conectar a la base de datos
    $server = "localhost";
    $dbname = "server";
    $user = "root";
    $password = "";
    
    $conn = new mysqli($server, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }
?>