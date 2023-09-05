<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>

<?php
// Conectar a la base de datos
$server = "localhost";
$dbname = "login";
$user = "root";
$password = "";

$conn = new mysqli($server, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Obtener los datos de la tabla
$sql = "SELECT * FROM libros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos en una tabla
    echo "<table>";
    echo "<tr><th>NombreLibro</th><th>Autor</th><th>ISBN</th><th>Descripcion</th><th>Eliminar</th><th>Modificar</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["NombreLibro"]."</td>";
        echo "<td>".$row["Autor"]."</td>";
        echo "<td>".$row["ISBN"]."</td>";
        echo "<td>".$row["Descripcion"]."</td>";
        echo "<td><a href='eliminar.php?id=".$row["id"]."'>Eliminar</a></td>";
        echo "<td><a href='modificar.php?id=".$row["id"]."'>Modificar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron registros.";
}

$conn->close();
?>

</body>
</html>