<?php
require_once "../modelo/librosmodelo.php";
require_once "../controlador/libroscontrolador.php";
class libros{
    public $id_libro;
    public $titulo;
    public $autor;
    public $editorial;
    public $ISBN;
    public $numero_inventario;
    public $estado;

    public function mostrarlibros(){
        $respuesta = controladorlibros::ctrmostrarlibros();
        echo json_encode($respuesta);
    }
    public function agregarlibros(){
        $respuesta = controladorlibros::ctragregarlibros($this -> titulo,$this -> autor, $this -> editorial,$this -> ISBN,$this -> numero_inventario,$this -> estado);
        echo json_encode($respuesta);
    }
    public function modificarlibros(){
        $respuesta = controladorlibros::ctrmodificarlibro($this -> id_libro,$this -> titulo,$this -> autor, $this -> editorial,$this -> ISBN,$this -> numero_inventario,$this -> estado);
        echo json_encode($respuesta);
    }
    public function eliminarlibros(){
        $respuesta = controladorlibros::ctreliminarlibros($this -> id_libro);
        echo json_encode($respuesta);
    }
}

if(!isset($_POST["accion"])){
    $respuesta = new libros();
    $respuesta -> mostrarlibros();
}else{
    if($_POST["accion"]=="registrar"){
        $registrar = new libros();
        $registrar -> titulo =$_POST["titulo"];
        $registrar -> autor =$_POST["autor"];
        $registrar -> editorial =$_POST["editorial"];
        $registrar -> ISBN =$_POST["ISBN"];
        $registrar -> numero_inventario =$_POST["numero_inventario"];
        $registrar -> estado =$_POST["estado"];
        $registrar -> agregarlibros();
    }if($_POST["accion"]=="modificar"){
        $modificar = new libros();
        $modificar -> id_libro =$_POST["id_libro"];
        $modificar -> titulo =$_POST["titulo"];
        $modificar -> autor =$_POST["autor"];
        $modificar -> editorial =$_POST["editorial"];
        $modificar -> ISBN =$_POST["ISBN"];
        $modificar -> numero_inventario =$_POST["numero_inventario"];
        $modificar -> estado =$_POST["estado"];
        $modificar -> modificarlibros();
    }if($_POST["accion"]=="eliminar"){
        $eliminar = new libros();
        $eliminar -> id_libro =$_POST["id_libro"];
        $eliminar -> eliminarlibros();

    }
}
?>