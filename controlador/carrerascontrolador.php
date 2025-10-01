<?php
require_once "../modelo/carreramodelo.php";
class controladorcarreras{
    static public function ctrmostrarcarreras(){
        $respuesta = carreramodelo::mdlmostrarcarreras();
        return $respuesta;
    }
}
?>