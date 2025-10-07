<?php
require_once "../modelo/estadosmodelo.php";
class controladorestado{
    static public function ctrmostrarestados(){
        $respuesta = estadosmodelo::mdlmostrarestados();
        return $respuesta;
    }
}
?>