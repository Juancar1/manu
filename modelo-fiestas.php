<?php


if ($_POST['registro'] == 'nuevo') {

   
       
        $nombre_fiesta = filter_var($_POST['nombre_fiesta'], FILTER_SANITIZE_STRING);
        $nombre_fiesta = ucfirst(strtolower($nombre_fiesta));
        $nombre_sala = filter_var($_POST['nombre_sala'], FILTER_SANITIZE_STRING);
        $nombre_sala = ucfirst(strtolower($nombre_sala));
        //fecha
        $fecha_evento = filter_var($_POST['fecha_evento'], FILTER_SANITIZE_STRING);
        //hora
        $hora_evento = filter_var($_POST['hora_evento'], FILTER_SANITIZE_STRING);
        $texto = filter_var($_POST['texto'], FILTER_SANITIZE_STRING);
        $texto = ucfirst(strtolower($texto));
        $archivado = 0;
        

    try {

        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare("INSERT INTO fiestas (nombre_evento, fecha, hora_inicio, nombre_sala, observaciones, editado, archivado) VALUES (?, ?, ?, ?, ?, NOW(), ? ) ");
        $stmt->bind_param("sssssi", $nombre_fiesta, $fecha_evento, $hora_evento, $nombre_sala, $texto, $archivado);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro
            );
          die(json_encode($respuesta));
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }
        $stmt->close();
        $conn->close();

    } catch (exception $e) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));

}



if ($_POST['registro'] == 'eliminar') {

    
    $id_borrar = filter_var($_POST['id'], FILTER_VALIDATE_INT);

    try{
        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare('DELETE FROM fiestas WHERE id_fiesta = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->execute()){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }


    } catch (Exception $e){
        $respuesta = array (
            'respuesta' => $e->getMessage()
        );
    }
    die(json_encode($respuesta));
}
