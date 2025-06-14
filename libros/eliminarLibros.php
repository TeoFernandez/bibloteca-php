<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/eliminarLibros.css">
    <title>Eliminar Libros</title>
</head>
<body>
    <center>
        <h1>Eliminar Libros</h1>
    </center>
    <p>En esta sección podrás eliminar libros del sistema.</p>
    <h2>Formulario de Eliminación de Libros:</h2>
    <form action="procesarEliminacion.php" method="post">
        <label for="isbn">ISBN del Libro a Eliminar:</label>
        <input type="text" id="isbn" name="isbn" required><br><br>
        
        <button type="submit">Eliminar Libro</button>
        <button type="reset">Limpiar Formulario</button>
        <br><br><br>
        <button><a href="libros.php">Volver a la Sección de Libros</a></button>
    </form>
</body>
</html>