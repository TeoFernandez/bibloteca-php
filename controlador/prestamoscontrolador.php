<?php
require_once "../modelo/prestamosmodelo.php";
class controladorprestamos{
    static public function ctrmostrarprestamos(){
        $respuesta = prestamosmodelo::mdlmostrarprestamos();
        return $respuesta;
    }
    static public function ctragregarprestamos($id_libro,$dni_alumno,$fecha_prestamo){
        $respuesta = prestamosmodelo::mdlagregarprestamo($id_libro,$dni_alumno,$fecha_prestamo);
        return $respuesta;
    }
    static public function ctrdevolverprestamo($id_prestamos,$id_libro){
        $respuesta = prestamosmodelo::mdldevolverprestamo($id_prestamos,$id_libro);
        return $respuesta;
    }
    static public function ctreliminarprestamos($id_prestamos){
        $respuesta = prestamosmodelo::mdleliminarprestamo($id_prestamos);
        return $respuesta;
    }
}
?>