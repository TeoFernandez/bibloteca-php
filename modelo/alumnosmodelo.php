<?php
require_once "conexion.php";
class alumnosmodelo{
    static public function mdlmostraralumnos(){
        $st = conexion::conectar() -> prepare("SELECT * FROM alumnos");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }

    static public function mdlagregaralumnos($dni,$nombre,$apellido,$carrera){
        $st = conexion::conectar() -> prepare("INSERT INTO alumnos(dni,nombre,apellido,carrera) VALUES(:dni,:nombre,:apellido,:carrera)");
        $st -> bindParam(":dni",$dni,PDO::PARAM_INT);
        $st -> bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $st -> bindParam(":apellido",$apellido,PDO::PARAM_STR);
        $st -> bindParam(":carrera",$carrera,PDO::PARAM_STR);
        if($st -> execute()){
            echo "El alumno fue ingresado correctamente";
        }else{
            echo "El alumno no fue ingresado correctamente";
        }
    }
    static public function mdlmodificaralumnos($dni,$nombre,$apellido,$carrera){
        $st = conexion::conectar() -> prepare("UPDATE alumnos SET nombre=:nombre,apellido=:apellido,carrera=:carrera WHERE dni=:dni");
        $st -> bindParam(":dni",$dni,PDO::PARAM_INT);
        $st -> bindParam(":nombre",$nombre,PDO::PARAM_STR);
        $st -> bindParam(":apellido",$apellido,PDO::PARAM_STR);
        $st -> bindParam(":carrera",$carrera,PDO::PARAM_STR);
        if($st -> execute()){
            echo "El alumno fue modificado correctamente";
        }else{
            echo "El alumno no fue modificado correctamente";
        }
    }
    static public function mdleliminaralumnos($dni){
        $st = conexion::conectar() -> prepare("DELETE alumnos WHERE dni=:dni");
        $st -> bindParam(":dni",$dni,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El alumno fue eliminado correctamente";
        }else{
            echo "El alumno no fue eliminado correctamente";
        }

        
        
    }


}

?>