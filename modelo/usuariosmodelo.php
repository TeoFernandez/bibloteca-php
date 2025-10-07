<?php
require_once "conexion.php";
class usuariosmodelo{
    static public function mdlmostrarusuarios(){
        $st=conexion::conectar() -> prepare("SELECT * FROM usuarios");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
    static public function mdlagregarusuarios($usuario,$clave){
        $st=conexion::conectar() -> prepare("INSERT INTO usuarios(usuario,clave) VALUES(:usuario,:clave)");
        $st -> bindParam(":usuario",$usuario,PDO::PARAM_STR);
        $st -> bindParam(":clave",$clave,PDO::PARAM_STR);
        if($st -> execute()){
            echo "El usuario fue ingresado correctamente";
        }else{
            echo "El usuario no fue ingresado correctamente";
        }
    }
    static public function mdleliminarusuario($id){
        $st = conexion::conectar() -> prepare("DELETE FROM usuarios WHERE id=:id");
        $st -> bindParam(":id",$id,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El Usuario fue eliminado correctamente";
        }else{
            echo "El Usuario no fue eliminado correctamente";
        }
    }
    
}
?>