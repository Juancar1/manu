<?php


$id_trabajador = $_POST['id_trabajador'];
$id_fiesta = $_POST['id_fiesta'];

try {
    include_once 'funciones/conexion.php';
    $stmt = $conn->prepare('DELETE FROM asignaciones WHERE trabajador_id = ? and fiesta_id = ? ');
    $stmt->bind_param('ii', $id_trabajador, $id_fiesta);
    $stmt->execute();
    if ($stmt->affected_rows) {
        $respuesta = array(
            'respuesta' => 'exito',
            
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




