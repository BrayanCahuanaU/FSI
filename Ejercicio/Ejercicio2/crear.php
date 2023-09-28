<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y obtener datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    // Realizar la conexión a la base de datos (reemplaza con tus propias credenciales)
    $conexion = new mysqli("sql311.infinityfree.com", "if0_34998991", "EfYFf1cXXfhg", "if0_34998991_usuarios_crud");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Insertar el nuevo usuario en la base de datos
    $sql = "INSERT INTO usuarios (nombre, correo, contraseña) VALUES ('$nombre', '$correo', '$contraseña')";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php"); // Redirigir a la página principal después de crear el usuario
        exit();
    } else {
        echo "Error al crear el usuario: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Usuario</h1>
    <form method="POST" action="crear.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" required><br>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br>
        
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
