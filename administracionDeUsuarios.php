<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Administracion de Usuarios</title>
    <link rel="stylesheet" href="Usuarios.css">
</head>
<body>
    <div class="container">
        <h2>Administracion de Usuarios</h2>

        <?php
        // Inicia o continúa la sesión
        session_start();

        // Incluye la conexión
        include("bdconect.php");

        // --- CREAR USUARIO --- 
        if (isset($_POST["crear"])) {
            $usuario = $_POST["nuevo_usuario"] ?? '';
            $clave = $_POST["nueva_clave"] ?? '';
            if (!empty($usuario) && !empty($clave)) {
                $sql = "INSERT INTO usuario (usuario, clave) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $usuario, $clave);
                $stmt->execute();
            }
        }

        // --- ELIMINAR USUARIO --- 
        if (isset($_POST["eliminar"])) {
            $idEliminar = $_POST["id_eliminar"] ?? '';
            if (!empty($idEliminar)) {
                $sql = "DELETE FROM usuario WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $idEliminar);
                $stmt->execute();
            }
        }

        // --- EDITAR USUARIO --- 
        if (isset($_POST["editar"])) {
            $idEditar = $_POST["id_editar"] ?? '';
            $nuevoUsuario = $_POST["usuario_editado"] ?? '';
            $nuevaClave = $_POST["clave_editada"] ?? '';
            if (!empty($idEditar) && !empty($nuevoUsuario) && !empty($nuevaClave)) {
                $sql = "UPDATE usuario SET usuario = ?, clave = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssi", $nuevoUsuario, $nuevaClave, $idEditar);
                $stmt->execute();
            }
        }

        // --- OBTENER USUARIOS --- 
        $usuarios = $conn->query("SELECT * FROM usuario");

        ?>

        <!-- FORMULARIO: ALTA -->
        <h3>Dar de alta un nuevo usuario</h3>
        <form method="POST">
            <input type="text" name="nuevo_usuario" placeholder="Usuario" required>
            <input type="password" name="nueva_clave" placeholder="Clave" required>
            <input type="submit" name="crear" value="Crear">
        </form>

        <!-- FORMULARIO: ELIMINAR -->
        <h3>Eliminar un usuario</h3>
        <form method="POST">
            <input type="number" name="id_eliminar" placeholder="ID de Usuario" required>
            <input type="submit" name="eliminar" value="Eliminar">
        </form>

        <!-- FORMULARIO: EDITAR -->
        <h3>Editar un usuario</h3>
        <form method="POST">
            <input type="number" name="id_editar" placeholder="ID de Usuario" required>
            <input type="text" name="usuario_editado" placeholder="Nuevo nombre de Usuario" required>
            <input type="password" name="clave_editada" placeholder="Nueva Clave" required>
            <input type="submit" name="editar" value="Editar">
        </form>

        <!-- LISTA DE USUARIOS -->
        <h3>Lista de Usuarios Actuales</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Clave</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $usuarios->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($row["id"]) ?></td>
                        <td><?= htmlspecialchars($row["usuario"]) ?></td>
                        <td><?= htmlspecialchars($row["clave"]) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div><!-- .container -->
</body>
</html>
