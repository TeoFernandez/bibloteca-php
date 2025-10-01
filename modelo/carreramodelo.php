<?php
require_once "conexion.php";
class carreramodelo{
    static public function mdlmostrarcarreras(){
        $st=conexion::conectar() -> prepare("SELECT * FROM carreras");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
}
?>