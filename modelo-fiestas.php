<?php


if ($_POST['registro'] == 'nuevo') {

   
       
        $nombre_fiesta = $_POST['nombre_fiesta'];
        $nombre_fiesta = ucfirst(strtolower($nombre_fiesta));
        $nombre_sala = $_POST['nombre_sala'];
        $nombre_sala = ucfirst(strtolower($nombre_sala));
        //fecha
        $fecha_evento = $_POST['fecha_evento'];
        //hora
        $hora_evento = $_POST['hora_evento'];

        $texto = $_POST['texto'];
        $texto = ucfirst(strtolower($texto));
        


    try {

        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare("INSERT INTO fiestas (nombre_evento, fecha, hora_inicio, nombre_sala, observaciones, editado) VALUES (?, ?, ?, ?, ?, NOW()) ");
        $stmt->bind_param("sssss", $nombre_fiesta, $fecha_evento, $hora_evento, $nombre_sala, $texto);
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

    
    $id_borrar = $_POST['id'];

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
