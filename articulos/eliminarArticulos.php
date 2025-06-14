<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    
    <title>Eliminar Articulos</title>
</head>
<body>
    <center>
        <h1>Eliminar Articulos</h1>
    </center>

    <form action="eliminarArticulo.php" method="post">
        <label for="numeroInventario">Número de Inventario:</label>
        <input type="text" id="numeroInventario" name="numeroInventario" required><br><br>

        <button type="submit">Eliminar Articulo</button>
        <br><br><br>

        <button><a href="articulos.php">Volver</a></button>
</body>
</html>