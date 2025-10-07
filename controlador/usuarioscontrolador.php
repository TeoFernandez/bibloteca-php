<?php
require_once "../modelo/usuariosmodelo.php";
class controladorusuarios{
    static public function ctrmostrarusuarios(){
        $respuesta = usuariosmodelo::mdlmostrarusuarios();
        return $respuesta;
    }
    static public function ctragregarusuarios($usuario,$clave){
        $respuesta = usuariosmodelo::mdlagregarusuarios($usuario,$clave);
        return $respuesta;
    }
    static public function ctreliminarusuarios($id){
        $respuesta = usuariosmodelo::mdleliminarusuario($id);
        return $respuesta;
    }
}
?>
