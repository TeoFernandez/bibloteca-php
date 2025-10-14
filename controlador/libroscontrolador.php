<?php
require_once "../modelo/librosmodelo.php";
class controladorlibros{
    static public function ctrmostrarlibros(){
        $respuesta = librosmodelo::mdlmostrarlibros();
        return $respuesta;
    }
    static public function ctrmostrarlibrosprestamos(){
        $respuesta = librosmodelo::mdlmostrarlibrosprestamos();
        return $respuesta;
    }
    static public function ctragregarlibros($titulo,$autor,$editorial,$ISBN,$numero_inventario,$estado){
        $respuesta = librosmodelo::mdlagregarlibro($titulo,$autor,$editorial,$ISBN,$numero_inventario,$estado);
        return $respuesta;
    }
    static public function ctrmodificarlibro($id_libro,$titulo,$autor,$editorial,$ISBN,$numero_inventario,$estado){
        $respuesta = librosmodelo::mdlmodificarlibro($id_libro,$titulo,$autor,$editorial,$ISBN,$numero_inventario,$estado);
        return $respuesta;
    }
    static public function ctreliminarlibros($id_libro){
        $respuesta = librosmodelo::mdleliminarlibros($id_libro);
        return $respuesta;
    }
}
?>