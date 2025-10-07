<?php
require_once "../modelo/articulosmodelo.php";
require_once "../controlador/articuloscontrolador.php";
class articulos {
    public $id_articulo;
    public $articulo;
    public $detalle;
    public $numero_inventario;
    public $estado;

    public function mostrararticulos(){
        $respuesta = controladorarticulos::ctrmostrararticulos();
        echo json_encode($respuesta);
    }
    public function agregararticulo(){
        $respuesta = controladorarticulos::ctragregararticulo($this -> articulo,$this -> detalle,$this -> numero_inventario, $this -> estado);
        echo json_encode($respuesta);
    }
    public function modificararticulo(){
        $respuesta = controladorarticulos::ctrmodificararticulo($this -> id_articulo,$this -> articulo,$this -> detalle,$this -> numero_inventario ,$this -> estado);
        echo json_encode($respuesta);
    }
    public function eliminararticulo(){
        $respuesta = controladorarticulos::ctreliminararticulo($this -> id_articulo);
        echo json_encode($respuesta);
    }
}
if(!isset($_POST["accion"])){
    $respuesta = new articulos();
    $respuesta -> mostrararticulos();
}else{
    if($_POST["accion"]=="registrar"){
        $registrar = new articulos();
        $registrar -> articulo =$_POST["articulo"];
        $registrar -> detalle =$_POST["detalle"];
        $registrar -> numero_inventario =$_POST["numero_inventario"];
        $registrar -> estado =$_POST["estado"];
        $registrar -> agregararticulo();
    }
    if($_POST["accion"]=="eliminar"){
        $eliminar = new articulos();
        $eliminar -> id_articulo =$_POST["id_articulo"]; 
        $eliminar -> eliminararticulo();
    }
    if($_POST["accion"]=="modificar"){
        $modificar = new articulos();
        $modificar -> id_articulo =$_POST["id_articulo"];
        $modificar -> articulo =$_POST["articulo"];
        $modificar -> detalle =$_POST["detalle"];
        $modificar -> numero_inventario =$_POST["numero_inventario"];
        $modificar -> estado =$_POST["estado"];
        $modificar -> modificararticulo();
    }
}
?>