<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/newPrestamo.css">
    <title>Nuevo Prestamo</title>
</head>
<body>
    <h1>Nuevo Prestamo</h1>
    <p>Bienvenido a la sección de solicitud de nuevo préstamo</p>
    <p>En esta sección podrás solicitar un nuevo préstamo de libros o productos.</p>

    <h2>Prestamo de Libros</h2>
    <center>
    <form method="POST" action="">
        Numero de Inventario: <input type="text" ><br>
        <br>
        DNI del Alumno: <input type="text"><br>
        <br>
        <input type="submit" value="Ingresar Prestamo de Libro">
    </form>
    </center>

    <h2>Prestamo de Articulo</h2>
    <center>
    <form method="POST" action="">
        Numero de Inventario: <input type="text" ><br>
        <br>
        DNI del Alumno: <input type="text"><br>
        <br>
        <input type="submit" value="Ingresar Prestamo de Articulo">
    </form>
    </center>

    <p><a href="prestamos.php">Volver</a></p>
</body>
</html>