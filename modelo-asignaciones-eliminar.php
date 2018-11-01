<?php

// Elimina la asignación de un trabajador a una fiesta
$id_trabajador = filter_var($_POST['id_trabajador'], FILTER_VALIDATE_INT);
$id_fiesta = filter_var($_POST['id_fiesta'], FILTER_VALIDATE_INT);

try {
    include_once 'funciones/conexion.php';
    $stmt = $conn->prepare('DELETE FROM asignaciones WHERE trabajador_id = ? and fiesta_id = ? ');
    $stmt->bind_param('ii', $id_trabajador, $id_fiesta);
    $stmt->execute();
    if ($stmt->affected_rows) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_trabajador' => $id_trabajador 
        );
    } else {
        $respuesta = array(
            'respuesta' => 'error'
        );
    }


} catch (Exception $e) {
    $respuesta = array(
        'respuesta' => $e->getMessage()
    );
}
die(json_encode($respuesta));




