<?php
require_once "../controlador/estadisticascontrolador.php";
class estadisticas{
    // 📊 Libros más prestados
    public function librosmasprestados() {
        $respuesta = controladorestadisticas::ctrlibrosmasprestados();
        echo json_encode($respuesta);
    }
    // 📊 Libros sin devolver
    public function librossindevolver() {
        $respuesta = controladorestadisticas::ctrlibrossindevolver();
        echo json_encode($respuesta);
    }
    // 📊 Alumnos con mas prestamos
    public function alumnosmasactivos() {
        $respuesta = controladorestadisticas::ctralumnosmasactivos();
        echo json_encode($respuesta);
    }
}
// -------------------------------------------------
// Ruteo: decide qué método ejecutar según ?accion=...
// -------------------------------------------------
if (isset($_GET["accion"])) {

    // lee y normaliza la acción
    $accion = $_GET["accion"];
    $accion_norm = strtolower($accion);

    $ajax = new estadisticas();

    switch ($accion_norm) {
        case 'librosmasprestados':
        case 'librosmasprestados': // redundante pero claro
        case 'librosmasprestados': // por si envías con distintas mayúsculas
            $ajax->librosmasprestados();
            break;

        case 'librossindevolver':
        case 'librossindevolver':
            $ajax->librossindevolver();
            break;

        case 'alumnosmasactivos':
        case 'alumnosmasactivos':
            $ajax->alumnosmasactivos();
            break;

        default:
            echo json_encode(["error" => "Acción no válida: " . $accion]);
    }

} else {
    echo json_encode(["error" => "No se recibió acción"]);
}
?>