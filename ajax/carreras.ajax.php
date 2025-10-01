<?php
require_once "../controlador/carrerascontrolador.php";
$carreras = controladorcarreras::ctrmostrarcarreras();
header('Content-Type: application/json');
echo json_encode($carreras);

?>