<?php
require_once "conexion.php";
class librosmodelo{
    static public function mdlmostrarlibros(){
        $st = conexion::conectar() -> prepare("SELECT libros.id_libro,libros.titulo,libros.autor,libros.editorial,libros.ISBN,
                                            libros.numero_inventario,estado.estado FROM libros
                                            INNER JOIN estado ON libros.estado=estado.id_estado");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
    static public function mdlmostrarlibrosprestamos(){
        $st = conexion::conectar() -> prepare("SELECT libros.id_libro,libros.titulo
                                            FROM libros
                                            WHERE libros.estado=1");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
    static public function mdlagregarlibro($titulo,$autor,$editorial,$ISBN,$numero_inventario,$estado){
        $st = conexion::conectar() -> prepare("INSERT INTO libros(titulo,autor,editorial,ISBN,numero_inventario,estado) 
                                            VALUES(:titulo,:autor,:editorial,:ISBN,:numero_inventario,:estado)");
        $st -> bindParam(":titulo",$titulo,PDO::PARAM_STR);
        $st -> bindParam(":autor",$autor,PDO::PARAM_STR);
        $st -> bindParam(":editorial",$editorial,PDO::PARAM_STR);
        $st -> bindParam(":ISBN",$ISBN,PDO::PARAM_STR);
        $st -> bindParam(":numero_inventario",$numero_inventario,PDO::PARAM_STR);
        $st -> bindParam(":estado",$estado,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El libro fue ingresado correctamente";
        }else{
            echo "El libro no fue ingresado correctamente";
        }
    }
    static public function mdlmodificarlibro($id_libro,$titulo,$autor,$editorial,$ISBN,$numero_inventario,$estado){
        $st = conexion::conectar() -> prepare("UPDATE libros SET titulo=:titulo,autor=:autor,editorial=:editorial,
                                            ISBN=:ISBN,numero_inventario=:numero_inventario,estado=:estado
                                            WHERE id_libro=:id_libro");
        $st -> bindParam(":id_libro",$id_libro,PDO::PARAM_INT);
        $st -> bindParam(":titulo",$titulo,PDO::PARAM_STR);
        $st -> bindParam(":autor",$autor,PDO::PARAM_STR);
        $st -> bindParam(":editorial",$editorial,PDO::PARAM_STR);
        $st -> bindParam(":ISBN",$ISBN,PDO::PARAM_STR);
        $st -> bindParam(":numero_inventario",$numero_inventario,PDO::PARAM_STR);
        $st -> bindParam(":estado",$estado,PDO::PARAM_STR);
        if($st -> execute()){
            echo "El libro fue modificado correctamente";
        }else{
            echo "El libro no fue modificado correctamente";
        }
    }
    static public function mdleliminarlibros($id_libro){
        $st = conexion::conectar() -> prepare("DELETE FROM libros WHERE id_libro=:id_libro");
        $st -> bindParam(":id_libro",$id_libro,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El libro fue eliminado correctamente";
        }else{
            echo "El libro no fue eliminado correctamente";
        }
    }

}
?>