<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Realizar la conexión a la base de datos (reemplaza con tus propias credenciales)
    $conexion = new mysqli("sql311.infinityfree.com", "if0_34998991", "EfYFf1cXXfhg", "if0_34998991_usuarios_crud");

    if ($conexion->connect_error) {
        die("Conexión fallida: " . $conexion->connect_error);
    }

    // Eliminar el usuario de la base de datos
    $sql = "DELETE FROM usuarios WHERE id=$id";

    if ($conexion->query($sql) === TRUE) {
        header("Location: index.php"); // Redirigir a la página principal después de eliminar el usuario
        exit();
    } else {
        echo "Error al eliminar el usuario: " . $conexion->error;
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
} else {
    echo "ID de usuario no especificado.";
}
?>
