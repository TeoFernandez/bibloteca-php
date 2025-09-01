<?php
require_once "../controlador/alumnoscontrolador.php";

class alumnos{
    public $dni;
    public $nombre;
    public $apellido;
    public $carrera;

    public function mostraralumnos(){
        $respuesta = controladoralumnos::ctrmostraralumnos();
        echo json_encode($respuesta);
    }

    public function agregaralumnos(){
        $respuesta = controladoralumnos::ctragregaralumnos($this -> dni,$this -> nombre,$this -> apellido, $this -> carrera);
        echo json_encode($respuesta);
    }
    public function modificaralumnos(){
        $respuesta = controladoralumnos::ctrmodificaralumnos($this -> dni,$this -> nombre,$this -> apellido, $this -> carrera);
        echo json_encode($respuesta);
    }
    public function eliminaralumnos(){
        $respuesta = controladoralumnos::ctreliminaralumnos($this -> dni);
        echo json_encode($respuesta);
    }
}
if(){
    
}


?>