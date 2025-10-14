<?php

require_once "conexion.php";

class estadisticasmodelo {
    // 📊 Libros más prestados
    public static function mdllibrosmasprestados(){
        $conexion = conexion::conectar();
        $st = $conexion -> prepare("SELECT libros.titulo, COUNT(prestamos.id_prestamos) as Cantidad
                                    FROM prestamos
                                    INNER JOIN libros ON prestamos.id_libro=libros.id_libro
                                    GROUP BY prestamos.id_libro
                                    ORDER BY cantidad DESC;");
        $st->execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
    // 📊 Libros aun no devueltos
    public static function mdllibrossindevolver(){
        $conexion = conexion::conectar();
        $st = $conexion -> prepare("SELECT libros.titulo, COUNT(*) as Cantidad
                                    FROM prestamos
                                    INNER JOIN libros ON prestamos.id_libro=libros.id_libro
                                    WHERE prestamos.fecha_devolucion IS NULL
                                    GROUP BY prestamos.id_libro
                                    ORDER BY cantidad DESC;");
        $st->execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
    // 📊 Alumnos con más préstamos
    public static function mdlalumnosmasactivos(){
        $conexion = conexion::conectar();
        $st = $conexion -> prepare("SELECT alumnos.nombre,alumnos.apellido,COUNT(prestamos.id_prestamos) as Cantidad
                                    FROM prestamos
                                    INNER JOIN alumnos ON prestamos.dni_alumno=alumnos.dni
                                    GROUP BY prestamos.dni_alumno
                                    ORDER BY cantidad DESC;");
        $st->execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
}

?>