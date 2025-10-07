<?php
require_once "../controlador/usuarioscontrolador.php";
require_once "../modelo//usuariosmodelo.php";
class usuarios{
    public $id;
    public $usuario;
    public $clave;
    
    public function mostrarusuarios(){
        $respuesta = controladorusuarios::ctrmostrarusuarios();
        echo json_encode($respuesta);
    }
    public function agregarusuario(){
        $respuesta = controladorusuarios::ctragregarusuarios($this -> usuario,$this -> clave);
        echo json_encode($respuesta);
    }
    public function eliminarusuario(){
        $respuesta = controladorusuarios::ctreliminarusuarios($this -> id);
        echo json_encode($respuesta);
    }
}
if(!isset($_POST["accion"])){
    $respuesta = new usuarios();
    $respuesta -> mostrarusuarios();
}else{
    if($_POST["accion"]=="registrar"){
        $registrar = new usuarios();
        $registrar -> usuario =$_POST["username"];
        $registrar -> clave =$_POST["clave"];
        $registrar -> agregarusuario();
    }
    if($_POST["accion"]=="eliminar"){
        $eliminar = new usuarios();
        $eliminar -> id =$_POST["id"];
        $eliminar -> eliminarusuario();
    }
}

?>