<link rel="stylesheet" href="styles/styles.css">

<?php
session_start();

include("bdconect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"] ?? '';
    $clave = $_POST["clave"] ?? '';

    $sql = "SELECT * FROM usuario WHERE usuario=? AND clave=?";
    $stmt = $conn->prepare($sql); // Prepara la consulta
    $stmt->bind_param("ss", $usuario, $clave); // Vincula los parámetros (usuario y clave)
    $stmt->execute(); // Ejecuta la consulta
    $resultado = $stmt->get_result(); // Obtiene el resultado de la consulta

    if ($resultado->num_rows == 1) {
        $_SESSION["usuario"] = $usuario;

        header("Location: index.php");
        exit(); // Finaliza el script para evitar que se ejecute más código
    } else {
        // Si las credenciales son incorrectas, define un mensaje de error
        $error = "Datos incorrectos";
    }
}
?>

<!-- PARTE 3: Formulario HTML -->

<!-- Muestra un formulario HTML para que el usuario ingrese sus credenciales -->
<center>
<form method="POST" action="">
    Usuario: <input type="text" name="usuario"><br>
    <br>
    Clave: <input type="password" name="clave"><br>
    <input type="submit" value="Ingresar">
</form>
</center>

<?php

// PARTE 4: Mostrar mensaje de error si existe
// Verifica si se definió un mensaje de error
if (isset($error)) {
    // Muestra el mensaje de error en color rojo
    echo "<p style='color:red;'>$error</p>";
}
?>
