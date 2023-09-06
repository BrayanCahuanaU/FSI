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
        $sql = "SELECT * FROM libros WHERE ISBN = '$isbn'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
    ?>
            <h1>Modificar Libro</h1>
            <form action='form.php' method='POST'>
                <input type='hidden' name='isbn' value='<?php echo $row['ISBN']; ?>'>

                <label for='nombreLibro'>Nombre del Libro:</label>
                <input type='text' id='nombreLibro' name='nombreLibro' value='<?php echo $row['NombreLibro']; ?>'>

                <label for='autor'>Autor:</label>
                <input type='text' id='autor' name='autor' value='<?php echo $row['Autor']; ?>'>

                <label for='descripcion'>Descripción:</label>
                <input type="text" id='descripcion' name='descripcion' value='<?php echo $row['Descripcion']; ?>'>

                <input type='submit' value='Guardar Cambios' class='btn'>
            </form>
    <?php
        } else {
            echo "No se encontró el libro con ese ISBN.";
        }
    } else {
        echo "No se proporcionó un parámetro 'id'.";
    }
    ?>
</body>
</html>
