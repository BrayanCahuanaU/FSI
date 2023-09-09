<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tu_base_de_datos";

    $conexion = new mysqli($servername, $username, $password, $dbname);

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contrasena = '$contrasena'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        header("Location: inicio.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }

    $conexion->close();
}
?>
