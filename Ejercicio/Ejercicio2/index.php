<?php
// Conexión a la base de datos (reemplaza con tus propias credenciales)
$conexion = new mysqli("localhost", "root", "", "tu_base_de_datos");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener todos los usuarios
$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
</head>
<body>
    <h1>CRUD de Usuarios</h1>
    <a href="crear.php">Agregar Usuario</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        <?php
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila["id"] . "</td>";
            echo "<td>" . $fila["nombre"] . "</td>";
            echo "<td>" . $fila["correo"] . "</td>";
            echo "<td><a href='editar.php?id=" . $fila["id"] . "'>Editar</a> | <a href='eliminar.php?id=" . $fila["id"] . "'>Eliminar</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conexion->close();
?>
