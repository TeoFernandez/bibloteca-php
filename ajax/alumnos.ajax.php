<?php
require_once "../controlador/alumnoscontrolador.php";
require_once "../modelo/alumnosmodelo.php";

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
if(!isset($_POST["accion"])){
    $respuesta = new alumnos();
    $respuesta -> mostraralumnos();
}else{
    if($_POST["accion"]=="registrar"){
        $registrar = new alumnos();
        $registrar -> dni =$_POST["dni"];
        $registrar -> nombre =$_POST["nombre"];
        $registrar -> apellido =$_POST["apellido"];
        $registrar -> carrera =$_POST["carrera"];
        $registrar -> agregaralumnos();
    }
}


?>