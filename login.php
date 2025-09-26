<link rel="stylesheet" href="login.css">
<?php

include("modelo/conexion.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"] ?? '';
    $clave = $_POST["clave"] ?? '';
    $db = conexion::conectar();
    $sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();
    if($stmt ->rowCount() == 1){
        $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);
        if($clave == $usuarioData['clave']){
            $_SESSION['usuario'] = $usuarioData['usuario'];
            header("Location: menu/index.php");
            exit();
        }else{
            echo "Contraseña Incorrecta";
        }
    }else{
        echo "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>

        <form method="POST" action="">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="clave" placeholder="Clave" required>
            <br>
            <input type="submit" value="Ingresar">
        </form>

        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
