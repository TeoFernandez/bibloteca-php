<?php
require_once "../modelo/prestamosarticulosmodelo.php";
class controladorprestamosarticulos{
    static public function ctrmostrarprestamosarticulos(){
        $respuesta = prestamosarticulosmodelo::mdlmostrarprestamosarticulos();
        return $respuesta;
    }
    static public function ctragregarprestamosarticulos($id_articulo,$dni_alumno,$fecha_prestamo){
        $respuesta = prestamosarticulosmodelo::mdlagregarprestamoarticulos($id_articulo,$dni_alumno,$fecha_prestamo);
        return $respuesta;
    }
    static public function ctreliminarprestamosarticulos($id_prestamos_articulos){
        $respuesta = prestamosarticulosmodelo::mdleliminarprestamoarticulos($id_prestamos_articulos);
        return $respuesta;
    }
    static public function ctrdevolverprestamosarticulos($id_prestamos_articulos,$id_articulo){
        $respuesta = prestamosarticulosmodelo::mdldevolverprestamoarticulos($id_prestamos_articulos,$id_articulo);
        return $respuesta;
    }
}
?>