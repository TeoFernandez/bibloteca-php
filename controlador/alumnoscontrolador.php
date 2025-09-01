<?php
require_once "../modelo/alumnosmodelo.php";

class controladoralumnos{
    static public function ctrmostraralumnos(){
        $respuesta = alumnosmodelo::mdlmostraralumnos();
        return $respuesta;
    }

    static public function ctragregaralumnos($dni,$nombre,$apellido,$carrera){
        $respuesta = alumnosmodelo::mdlagregaralumnos($dni,$nombre,$apellido,$carrera);
        return $respuesta;
    }

    static public function ctrmodificaralumnos($dni,$nombre,$apellido,$carrera){
        $respuesta = alumnosmodelo::mdlmodificaralumnos($dni,$nombre,$apellido,$carrera);
        return $respuesta;
    }
    
    static public function ctreliminaralumnos($dni){
        $respuesta = alumnosmodelo::mdleliminaralumnos($dni);
        return $respuesta;
    }
}
?>