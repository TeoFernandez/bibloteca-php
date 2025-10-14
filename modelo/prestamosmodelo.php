<?php
require_once "conexion.php";
class prestamosmodelo{
    static public function mdlmostrarprestamos(){
        $st = conexion::conectar() -> prepare("SELECT prestamos.id_prestamos,libros.titulo,alumnos.nombre,alumnos.apellido,prestamos.fecha_prestamo,
                                            prestamos.fecha_devolucion,estado.estado,prestamos.id_libro
                                            FROM prestamos
                                            INNER JOIN libros ON libros.id_libro=prestamos.id_libro
                                            INNER JOIN alumnos ON alumnos.dni=prestamos.dni_alumno
                                            INNER JOIN estado ON estado.id_estado=libros.estado");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
    static public function mdlagregarprestamo($id_libro, $dni_alumno, $fecha_prestamo) {
        $conexion = conexion::conectar();

        // Iniciar transacción para asegurar consistencia
        $conexion->beginTransaction();

        try {
            // 1. Insertar el préstamo
            $st = $conexion->prepare("INSERT INTO prestamos(id_libro, dni_alumno, fecha_prestamo) 
                                    VALUES(:id_libro, :dni_alumno, :fecha_prestamo)");
            $st->bindParam(":id_libro", $id_libro, PDO::PARAM_INT);
            $st->bindParam(":dni_alumno", $dni_alumno, PDO::PARAM_STR);
            $st->bindParam(":fecha_prestamo", $fecha_prestamo, PDO::PARAM_STR);

            if (!$st->execute()) {
                throw new Exception("Error al insertar el préstamo.");
            }

            // 2. Cambiar el estado del libro a 'Prestado'
            $st2 = $conexion->prepare("UPDATE libros SET estado = 2 WHERE id_libro = :id_libro");
            $st2->bindParam(":id_libro", $id_libro, PDO::PARAM_INT);

            if (!$st2->execute()) {
                throw new Exception("Error al actualizar el estado del libro.");
            }

            // Confirmar transacción
            $conexion->commit();
            echo "El Préstamo fue ingresado y el estado del libro se actualizó correctamente.";

        } catch (Exception $e) {
            // Revertir cambios si algo falla
            $conexion->rollBack();
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
    static public function mdldevolverprestamo($id_prestamos, $id_libro){
        $conexion = conexion::conectar();
        $conexion->beginTransaction();

        try {
            // 1. Actualizar fecha de devolución
            $stmt = $conexion->prepare("UPDATE prestamos 
                                        SET fecha_devolucion = NOW() 
                                        WHERE id_prestamos = :id_prestamos");
            $stmt->bindParam(":id_prestamos", $id_prestamos, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                throw new Exception("Error al actualizar la fecha de devolución");
            }

            // 2. Cambiar estado del libro a 'Disponible'
            $stmt2 = $conexion->prepare("UPDATE libros 
                                        SET estado = 1 
                                        WHERE id_libro = :id_libro");
            $stmt2->bindParam(":id_libro", $id_libro, PDO::PARAM_INT);
            if (!$stmt2->execute()) {
                throw new Exception("Error al actualizar el estado del libro");
            }

            $conexion->commit();
            echo "ok";

        } catch (Exception $e) {
            $conexion->rollBack();
            echo "error: " . $e->getMessage();
        }
    }
    static public function mdleliminarprestamo($id_prestamos){
        $st = conexion::conectar() -> prepare("DELETE FROM prestamos WHERE id_prestamos=:id_prestamos");
        $st -> bindParam(":id_prestamos",$id_prestamos,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El Prestamo fue eliminado correctamente";
        }else{
            echo "El Prestamo no fue eliminado correctamente";
        }
    }
}
?>