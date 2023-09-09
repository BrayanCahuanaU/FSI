<!DOCTYPE html>
<html>
<link rel="stylesheet" href="styles.css">
<title>Form</title>
<head> 
    <?php
        include 'conexion.php';        
        // Obtener los datos de la tabla
        $sql = "SELECT * FROM libros";
        $result = $conn->query($sql);
    ?>       
</head>
<body>
    <div class="contenedor">
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
        if ($result->num_rows > 0) {
            // Mostrar los datos en una tabla
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["NombreLibro"]."</td>";
                echo "<td>".$row["Autor"]."</td>";
                echo "<td>".$row["ISBN"]."</td>";
                echo "<td>".$row["Descripcion"]."</td>";
                // Corrección en los enlaces de eliminar y modificar
                echo "<td><a href='formEliminar.php?id=".$row["ISBN"]."'>Eliminar</a></td>";
                echo "<td><a href='formModificar.php?id=".$row["ISBN"]."'>Modificar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "No se encontraron registros.";
        }
        ?>
    </table>
    </div>
</body>
</html>
