<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ingresarLibros.css">
    <title>Ingreso de Libros</title>
</head>
<body>
    
    <center>
        <h1>Ingreso de Libros</h1>
    </center>

    <p>En esta sección podrás ingresar nuevos libros al sistema.</p>
    <h2>Formulario de Ingreso de Libros:</h2>
    <form action="procesarIngreso.php" method="post">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required><br><br>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required><br><br>

        <label for="editorial">Editorial:</label>
        <input type="text" id="editorial" name="editorial" required><br><br>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" required><br><br>
        
        <label for="cantidad">Cantidad de Copias:</label>
        <input type="number" id="cantidad" name="cantidad" required><br><br>

        <label for="numero_inventario">Número de Inventario:</label>
        <input type="text" id="numero_inventario" name="numero_inventario" required><br><br>
        
        <label for="estado">Estado:</label>
        <select id="estado" name="estado" required>
            <option value="disponible">Disponible</option>
            <option value="prestado">Prestado</option>
            <option value="reservado">Reservado</option>
        </select>

        <br><br>
        <button type="submit">Ingresar Libro</button>
        <button type="reset">Limpiar Formulario</button>
        <br><br><br>
        <button><a href="libros.php">Volver a la Sección de Libros</a></button>
    </form>

    <title>Document</title>
</head>
<body>
    
</body>
</html>