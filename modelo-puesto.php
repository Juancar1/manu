<?php



if ($_POST['registro'] == 'nuevo') {


    $nombre_fiesta = htmlspecialchars($_POST['nombre_puesto']);
    $nombre_fiesta = ucfirst(strtolower($nombre_fiesta));

    try {

        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare("INSERT INTO puestos (nombre_puesto, editado) VALUES (?, NOW()) ");
        $stmt->bind_param("s", $nombre_fiesta);
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


    $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);

    try{
        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare('DELETE FROM puestos WHERE id_puestos = ? ');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        if ($stmt->execute()) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id
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

