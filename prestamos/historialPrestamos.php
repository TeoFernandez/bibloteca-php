<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Historial de Prestamos</title>
</head>
<body>

    <h1>Historial de Prestamos</h1>

    <h2>Prestamos Pendientes:</h2><br>
    <input type="text" placeholder="Buscar por DNI del Alumno"><br>
    <button>Buscar</button>
    <table border="1">
        <tr>
            <th>Numero de Inventario</th>
            <th>DNI del Alumno</th>
            <th>Fecha de Prestamo</th>
            <th>Fecha de Devolucion</th>
            <th>Estado</th>
        </tr>
        <!-- Aquí se mostrarían los datos de los préstamos pendientes -->
        <tr>
            <td>12345</td>
            <td>12345678</td>
            <td>2023-10-01</td>
            <td>2023-10-15</td>
            <td>Pendiente</td>
        </tr>
    </table>
    
    <h2>Historial de Prestamos:</h2>
    <input type="text" placeholder="Buscar por DNI del Alumno"><br>
    <button>Buscar</button>
    <table border="1">
        <tr>
            <th>Numero de Inventario</th>
            <th>DNI del Alumno</th>
            <th>Fecha de Prestamo</th>
            <th>Fecha de Devolucion</th>
            <th>Estado</th>
        </tr>
        <!-- Aquí se mostrarían los datos de los préstamos -->
        <tr>
            <td>12345</td>
            <td>12345678</td>
            <td>2023-10-01</td>
            <td>2023-10-15</td>
            <td>Pendiente</td>
        </tr>
    </table>

    <p><a href="prestamos.php">Volver</a></p>
</body>
</html>