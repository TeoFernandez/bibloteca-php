<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ingresarArticulos.css">
    <title>Ingreso de Articulos</title>
</head>
<body>

    <center>
    <h1>Ingreso de Articulos.</h1>
    </center>

    <form action="guardarArticulo.php" method="post">
        <label for="nombre">Nombre del Articulo:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="cantidad">Cantidad:</label>
        <input type="text" id="cantidad" name="cantidad" required><br><br>

        <label for="descripcion">Detalle:</label>
        <textarea id="descripcion" name="descripcion" required></textarea><br><br>

        <label for="numeroInventario">Número de Inventario:</label>
        <input type="text" id="numeroInventario" name="numeroInventario" required><br><br>

        <button type="submit">Guardar Articulo</button>
        <br><br><br>

        <button><a href="articulos.php">Volver</a></button>
    
</body>
</html>