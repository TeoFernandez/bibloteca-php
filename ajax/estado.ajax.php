<?php
require_once "../controlador/estadocontrolador.php";
$estado = controladorestado::ctrmostrarestados();
header('Content-Type: application/json');
echo json_encode($estado);

?>