<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'bdbibloteca';

// Conexión con el puerto incluido
$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>