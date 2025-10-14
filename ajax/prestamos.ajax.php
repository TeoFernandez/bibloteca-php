<?php
require_once "../controlador/prestamoscontrolador.php";
require_once "../modelo/prestamosmodelo.php";
class prestamos{
    public $id_prestamos;
    public $id_libro;
    public $dni_alumno;
    public $fecha_prestamo;
    public $fecha_devolucion;

    public function mostrarprestamos(){
        $respuesta = controladorprestamos::ctrmostrarprestamos();
        echo json_encode($respuesta);
    }
    public function agregarprestamos(){
        $respuesta = controladorprestamos::ctragregarprestamos($this -> id_libro,$this -> dni_alumno,$this -> fecha_prestamo);
        echo json_encode($respuesta);
    }
    public function devolverprestamo(){
        $respuesta = controladorprestamos::ctrdevolverprestamo($this -> id_prestamos,$this -> id_libro);
        echo json_encode($respuesta);

    }
    public function eliminarprestamo(){
        $respuesta = controladorprestamos::ctreliminarprestamos($this -> id_prestamos);
        echo json_encode($respuesta);
    }
}
if(!isset($_POST["accion"])){
    $respuesta = new prestamos();
    $respuesta -> mostrarprestamos();
}else{
    if($_POST["accion"]=="registrar"){
        $registrar = new prestamos();
        $registrar -> id_libro =$_POST["id_libro"];
        $registrar -> dni_alumno =$_POST["dni_alumno"];
        $registrar -> fecha_prestamo =$_POST["fecha_prestamo"];
        $registrar -> agregarprestamos();
    }
    if($_POST["accion"]=="devolver"){
        $devolver = new prestamos();
        $devolver -> id_prestamos=$_POST["id_prestamos"];
        $devolver -> id_libro=$_POST["id_libro"];
        $devolver -> devolverprestamo();

    }
    if($_POST["accion"]=="eliminar"){
        $eliminar = new prestamos();
        $eliminar -> id_prestamos =$_POST["id_prestamos"];
        $eliminar -> eliminarprestamo();
    }
}
?>