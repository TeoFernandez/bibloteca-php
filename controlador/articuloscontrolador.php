<?php
require_once "../modelo/articulosmodelo.php";
class controladorarticulos{
    static public function ctrmostrararticulos(){
        $respuesta = articulosmodelo::mdlmostrararticulos();
        return $respuesta;
    }

    static public function ctragregararticulo($articulo,$detalle,$numero_inventario,$estado){
        $respuesta = articulosmodelo::mdlagregararticulo($articulo,$detalle,$numero_inventario,$estado);
        return $respuesta;
    }

    static public function ctrmodificararticulo($id_articulo,$articulo,$detalle,$numero_inventario,$estado){
        $respuesta = articulosmodelo::mdlmodificararticulo($id_articulo,$articulo,$detalle,$numero_inventario,$estado);
        return $respuesta;
    }
    static public function ctreliminararticulo($id_articulo){
        $respuesta = articulosmodelo::mdleliminararticulo($id_articulo);
        return $respuesta;
    }
}
?>