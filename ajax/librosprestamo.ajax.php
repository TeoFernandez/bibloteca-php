<?php
require_once "../controlador/libroscontrolador.php";
$libros = controladorlibros::ctrmostrarlibrosprestamos();
header('Content-Type: application/json');
echo json_encode($libros);

?>