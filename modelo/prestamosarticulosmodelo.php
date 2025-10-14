<?php
require_once "conexion.php";
class prestamosarticulosmodelo{
    static public function mdlmostrarprestamosarticulos(){
        $st = conexion::conectar() -> prepare("SELECT prestamos_articulos.id_prestamos_articulos,articulos.articulo,alumnos.nombre,alumnos.apellido,prestamos_articulos.fecha_prestamo,
                                            prestamos_articulos.fecha_devolucion,estado.estado,prestamos_articulos.id_articulo
                                            FROM prestamos_articulos
                                            INNER JOIN articulos ON articulos.id_articulo=prestamos_articulos.id_articulo
                                            INNER JOIN alumnos ON alumnos.dni=prestamos_articulos.dni_alumno
                                            INNER JOIN estado ON estado.id_estado=articulos.estado;");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
    static public function mdlagregarprestamoarticulos($id_articulo, $dni_alumno, $fecha_prestamo) {
        $conexion = conexion::conectar();

        // Iniciar transacción para asegurar consistencia
        $conexion->beginTransaction();

        try {
            // 1. Insertar el préstamo
            $st = $conexion->prepare("INSERT INTO prestamos_articulos(id_articulo, dni_alumno, fecha_prestamo) 
                                    VALUES(:id_articulo, :dni_alumno, :fecha_prestamo)");
            $st->bindParam(":id_articulo", $id_articulo, PDO::PARAM_INT);
            $st->bindParam(":dni_alumno", $dni_alumno, PDO::PARAM_STR);
            $st->bindParam(":fecha_prestamo", $fecha_prestamo, PDO::PARAM_STR);

            if (!$st->execute()) {
                throw new Exception("Error al insertar el préstamo.");
            }

            // 2. Cambiar el estado del libro a 'Prestado'
            $st2 = $conexion->prepare("UPDATE articulos SET estado = 2 WHERE id_articulo = :id_articulo");
            $st2->bindParam(":id_articulo", $id_articulo, PDO::PARAM_INT);

            if (!$st2->execute()) {
                throw new Exception("Error al actualizar el estado del Articulo.");
            }

            // Confirmar transacción
            $conexion->commit();
            echo "El Préstamo fue ingresado y el estado del Articulo se actualizó correctamente.";

        } catch (Exception $e) {
            // Revertir cambios si algo falla
            $conexion->rollBack();
            echo "Ocurrió un error: " . $e->getMessage();
        }
    }
    static public function mdleliminarprestamoarticulos($id_prestamos_articulos){
        $st = conexion::conectar() -> prepare("DELETE FROM prestamos_articulos WHERE id_prestamos_articulos=:id_prestamos_articulos");
        $st -> bindParam(":id_prestamos_articulos",$id_prestamos_articulos,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El Prestamo fue eliminado correctamente";
        }else{
            echo "El Prestamo no fue eliminado correctamente";
        }
    }
    static public function mdldevolverprestamoarticulos($id_prestamos_articulos,$id_articulo){
        $conexion = conexion::conectar();
        $conexion->beginTransaction();

        try {
            // 1. Actualizar fecha de devolución
            $stmt = $conexion->prepare("UPDATE prestamos_articulos 
                                        SET fecha_devolucion = NOW() 
                                        WHERE id_prestamos_articulos = :id_prestamos_articulos");
            $stmt->bindParam(":id_prestamos_articulos", $id_prestamos_articulos, PDO::PARAM_INT);
            if (!$stmt->execute()) {
                throw new Exception("Error al actualizar la fecha de devolución");
            }

            // 2. Cambiar estado del libro a 'Disponible'
            $stmt2 = $conexion->prepare("UPDATE articulos 
                                        SET estado = 1 
                                        WHERE id_articulo = :id_articulo");
            $stmt2->bindParam(":id_articulo", $id_articulo, PDO::PARAM_INT);
            if (!$stmt2->execute()) {
                throw new Exception("Error al actualizar el estado del Articulo");
            }

            $conexion->commit();
            echo "ok";

        } catch (Exception $e) {
            $conexion->rollBack();
            echo "error: " . $e->getMessage();
        }
    }
}
?>