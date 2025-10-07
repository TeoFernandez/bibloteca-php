<?php
require_once "conexion.php";
class articulosmodelo{
    static public function mdlmostrararticulos(){
        $st = conexion::conectar() -> prepare("SELECT articulos.id_articulo,articulos.articulo,.articulos.detalle,articulos.numero_inventario,estado.estado 
                                            FROM articulos
                                            INNER JOIN estado ON articulos.estado=estado.id_estado");
        $st -> execute();
        return $st -> fetchAll(PDO::FETCH_ASSOC);
    }
    static public function mdlagregararticulo($articulo,$detalle,$numero_inventario,$estado){
        $st = conexion::conectar() -> prepare("INSERT INTO articulos(articulo,detalle,numero_inventario,estado) VALUES(:articulo,:detalle,:numero_inventario,:estado)");
        $st -> bindParam(":articulo",$articulo,PDO::PARAM_STR);
        $st -> bindParam(":detalle",$detalle,PDO::PARAM_STR);
        $st -> bindParam(":numero_inventario",$numero_inventario,PDO::PARAM_STR);
        $st -> bindParam(":estado",$estado,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El Articulo fue ingresado correctamente";
        }else{
            echo "El Articulo no fue ingresado correctamente";
        }
    }
    static public function mdlmodificararticulo($id_articulo,$articulo,$detalle,$numero_inventario,$estado){
        $st = conexion::conectar() -> prepare("UPDATE articulos SET articulo=:articulo,detalle=:detalle,numero_inventario=:numero_inventario,estado=:estado WHERE id_articulo=:id_articulo");
        $st -> bindParam(":id_articulo",$id_articulo,PDO::PARAM_INT);
        $st -> bindParam(":articulo",$articulo,PDO::PARAM_STR);
        $st -> bindParam(":detalle",$detalle,PDO::PARAM_STR);
        $st -> bindParam(":numero_inventario",$numero_inventario,PDO::PARAM_STR);
        $st -> bindParam(":estado",$estado,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El Articulo fue modificado correctamente";
        }else{
            echo "El Articulo no fue modificado correctamente";
        }
    }
    static public function mdleliminararticulo($id_articulo){
        $st = conexion::conectar() -> prepare("DELETE FROM articulos WHERE id_articulo=:id_articulo");
        $st -> bindParam(":id_articulo",$id_articulo,PDO::PARAM_INT);
        if($st -> execute()){
            echo "El Articulo fue eliminado correctamente";
        }else{
            echo "El Articulo no fue eliminado correctamente";
        }
    }
}
?>