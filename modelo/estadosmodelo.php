<?php
require_once "conexion.php";
class estadosmodelo{
    static public function mdlmostrarestados(){
        $st=conexion::conectar() -> prepare("SELECT * FROM estado");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
}
?>