<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar y obtener datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    // Realizar la conexión a la base de datos (reemplaza con tus propias credenciales)
    $conexion = new mysqli("sql311.infinityfree.com", "if0_34998991", "EfYFf1cXXfhg", "if0_34998991_usuarios_crud");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Actualizar el usuario en la base de datos
    $sql = "UPDATE usuarios SET nombre='$nombre', correo='$correo', contraseña='$contraseña' WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php"); // Redirigir a la página principal después de editar el usuario
        exit();
    } else {
        echo "Error al editar el usuario: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Realizar la conexión a la base de datos (reemplaza con tus propias credenciales)
    $conexion = new mysqli("sql311.infinityfree.com", "if0_34998991", "EfYFf1cXXfhg", "if0_34998991_usuarios_crud");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Obtener los datos del usuario
    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows == 1) {
        $fila = $resultado->fetch_assoc();
        $nombre = $fila["nombre"];
        $correo = $fila["correo"];
        // No se recomienda mostrar la contraseña en el formulario de edición
    } else {
        echo "Usuario no encontrado.";
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "ID de usuario no especificado.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <form method="POST" action="editar.php" accept-charset="UTF-8">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required><br>
        
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>" required><br>
        
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Dejar en blanco para no cambiar"><br>
        
        <button type="submit">Guardar Cambios</button>
    </form>
</body>
</html>
