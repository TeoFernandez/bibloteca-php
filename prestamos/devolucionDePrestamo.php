<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Devolucion de Prestamo</title>
</head>
<body>
    <h1>Devolucion de Prestamos</h1>
    <p>Bienvenido a la sección de devolución de préstamos. En esta sección podrás devolver libros o productos que hayas solicitado en préstamo.</p>

    <h2>Devolución de Libros</h2>
    <center>
    <form method="POST" action="">
        DNI del Alumno: <input type="text" name="inventario"><br>
        <br>
        Lista de prestamos:
        <select name="prestamos">
            <option value="prestamo1">Prestamo 1</option>
            <option value="prestamo2">Prestamo 2</option>
            <option value="prestamo3">Prestamo 3</option>
            <!-- Aquí se agregarían dinámicamente los préstamos del alumno -->
        <br>
        <input type="submit" value="Devolver Libro">
    </center>

    <p><a href="prestamos.php">Volver</a></p>
</body>
</html>