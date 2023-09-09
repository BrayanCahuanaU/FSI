<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["isbn"], $_POST["nombreLibro"], $_POST["autor"], $_POST["descripcion"])) {
        $isbn = $_POST["isbn"];
        $nombreLibro = $_POST["nombreLibro"];
        $autor = $_POST["autor"];
        $descripcion = $_POST["descripcion"];

        $sql = "UPDATE libros SET NombreLibro = '$nombreLibro', Autor = '$autor', Descripcion = '$descripcion' WHERE ISBN = '$isbn'";

        if ($conn->query($sql) === TRUE) {
            echo "Los datos se actualizaron correctamente.";
        } else {
            echo "Error al actualizar los datos: " . $conn->error;
        }
    } else {
        echo "No se recibieron todos los datos del formulario.";
    }

    // Redirecciona de nuevo a form.php
    header("Location: form.php");
    exit;
} elseif (isset($_GET['id'])) {
    $isbn = $_GET['id'];
    $sql = "SELECT * FROM libros WHERE ISBN = '$isbn'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
?>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="styles.css">
            <title>Modificar Libro</title>
        </head>
        <body>
            <h1>Modificar Libro</h1>
            <form action="" method="POST">
                <input type="hidden" name="isbn" value="<?php echo $row['ISBN']; ?>">
                <label for="nombreLibro">Nombre del Libro:</label>
                <input type="text" id="nombreLibro" name="nombreLibro" value="<?php echo $row['NombreLibro']; ?>">

                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" value="<?php echo $row['Autor']; ?>">

                <label for="descripcion">Descripción:</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $row['Descripcion']; ?>">

                <input type="submit" value="Guardar Cambios" class="btn">
            </form>
        </body>
        </html>
<?php
    } else {
        echo "No se encontró el libro con ese ISBN.";
    }
} else {
    echo "No se proporcionó un parámetro 'id'.";
}
?>
