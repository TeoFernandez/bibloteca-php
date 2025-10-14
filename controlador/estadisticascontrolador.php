<?php
require_once "../modelo/estadisticasmodelo.php";
class controladorestadisticas{
    static public function ctrlibrosmasprestados(){
        $respuesta = estadisticasmodelo::mdllibrosmasprestados();
        return $respuesta;
    }
    static public function ctrlibrossindevolver(){
        $respuesta = estadisticasmodelo::mdllibrossindevolver();
        return $respuesta;
    }
    static public function ctralumnosmasactivos(){
        $respuesta = estadisticasmodelo::mdlalumnosmasactivos();
        return $respuesta;
    }
}
?>