<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <?php
        include 'conexion.php';        
    ?>
    <title>Form</title>
</head>
<body>
<?php
if (isset($_GET['id'])) {
    $isbn = $_GET['id'];
    
    // Eliminar y obtener los datos de la tabla
    $sql = "DELETE FROM libros WHERE ISBN = '$isbn'";
    $sql_select = "SELECT * FROM libros";
}
?>
    <table>
        <tr>
            <th>NombreLibro</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Descripcion</th>
            <th>Eliminar</th>
            <th>Modificar</th>
        </tr>
        <?php
            if ($conn->query($sql) == TRUE) {
                $result = $conn->query($sql_select);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["NombreLibro"]."</td>";
                        echo "<td>".$row["Autor"]."</td>";
                        echo "<td>".$row["ISBN"]."</td>";
                        echo "<td>".$row["Descripcion"]."</td>";
                        echo "<td><a href='formEliminar.php?id=".$row["ISBN"]."'>Eliminar</a></td>";
                        echo "<td><a href='formModificar.php?id=".$row["ISBN"]."'>Modificar</a></td>";
                        echo "</tr>";
                    }
                    echo "Registro eliminado con éxito.";
                } else {
                    echo "No se encontraron registros.";
                }
            } else {
                echo "Error al eliminar el registro: " . $conn->error;
            }
        ?>
    </table>
</body>
</html>