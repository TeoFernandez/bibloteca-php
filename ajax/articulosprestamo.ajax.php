<?php
require_once "../controlador/articuloscontrolador.php";
$articulos = controladorarticulos::ctrmostrararticulosprestamos();
header('Content-Type: application/json');
echo json_encode($articulos);

?>