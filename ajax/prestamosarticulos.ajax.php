<?php
require_once "../controlador/prestamoarticuloscontrolador.php";
class prestamosarticulos{
    public $id_prestamos_articulos;
    public $id_articulo;
    public $dni_alumno;
    public $fecha_prestamo;
    public $fecha_devolucion;

    public function mostrarprestamosarticulos(){
        $respuesta = controladorprestamosarticulos::ctrmostrarprestamosarticulos();
        echo json_encode($respuesta);
    }
    public function agregarprestamosarticulos(){
        $respuesta = controladorprestamosarticulos::ctragregarprestamosarticulos($this -> id_articulo,$this -> dni_alumno,$this -> fecha_prestamo);
        echo json_encode($respuesta);
    }
    public function eliminarprestamosarticulos(){
        $respuesta = controladorprestamosarticulos::ctreliminarprestamosarticulos($this -> id_prestamos_articulos);
        echo json_encode($respuesta);
    }
    public function devolverprestamosarticulos(){
        $respuesta = controladorprestamosarticulos::ctrdevolverprestamosarticulos($this -> id_prestamos_articulos,$this -> id_articulo);
        echo json_encode($respuesta);
    }
}
if(!isset($_POST["accion"])){
    $respuesta = new prestamosarticulos();
    $respuesta -> mostrarprestamosarticulos();
}else{
    if($_POST["accion"]=="registrar"){
        $registrar = new prestamosarticulos();
        $registrar -> id_articulo =$_POST["id_articulo"];
        $registrar -> dni_alumno =$_POST["dni_alumno"];
        $registrar -> fecha_prestamo =$_POST["fecha_prestamo"];
        $registrar -> agregarprestamosarticulos();
    }if($_POST["accion"]=="eliminar"){
        $eliminar = new prestamosarticulos();
        $eliminar -> id_prestamos_articulos =$_POST["id_prestamos_articulos"];
        $eliminar -> eliminarprestamosarticulos();
    }
    if($_POST["accion"]=="devolver"){
        $devolver = new prestamosarticulos();
        $devolver -> id_prestamos_articulos=$_POST["id_prestamos_articulos"];
        $devolver -> id_articulo=$_POST["id_articulo"];
        $devolver -> devolverprestamosarticulos();

    }
}
?>