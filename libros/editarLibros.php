<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Libros</title>
</head>
<body>
    
    <center>
        <h1>Editar Libros</h1>
    </center>
    <p>En esta sección podrás editar los detalles de los libros existentes en el sistema.</p>
    <h2>Formulario de Edición de Libros:</h2>
    <form action="procesarEdicion.php" method="post">
        <label for="isbn">ISBN del Libro a Editar:</label>
        <input type="text" id="isbn" name="isbn" required><br><br>
        
        <label for="titulo">Nuevo Título:</label>
        <input type="text" id="titulo" name="titulo"><br><br>

        <label for="autor">Nuevo Autor:</label>
        <input type="text" id="autor" name="autor"><br><br>

        <label for="editorial">Nueva Editorial:</label>
        <input type="text" id="editorial" name="editorial"><br><br>

        <label for="cantidad">Nueva Cantidad de Copias:</label>
        <input type="number" id="cantidad" name="cantidad"><br><br>

        <label for="numero_inventario">Nuevo Número de Inventario:</label>
        <input type="text" id="numero_inventario" name="numero_inventario"><br><br>

        <label for="estado">Nuevo Estado:</label>
        <select id="estado" name="estado">
            <option value="">Seleccione un estado</option>
            <option value="disponible">Disponible</option>
            <option value="prestado">Prestado</option>
            <option value="reservado">Reservado</option>
        </select>

        <br><br>
        <button type="submit">Editar Libro</button>
        <button type="reset">Limpiar Formulario</button>
        <br><br><br>
        <button><a href="libros.php">Volver a la Sección de Libros</a></button>
    <title>Document</title>
</head>
<body>
    
</body>
</html>