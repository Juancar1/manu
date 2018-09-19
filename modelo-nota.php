<?php

if ($_POST['registro'] == 'nuevo') {

    $texto = $_POST['texto'];
    $texto = ucfirst(strtolower($texto));
    $fecha= date("Y-m-d H:i:s");
    try {

        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare("INSERT INTO notas (text, editado) VALUES (?, now()) ");
        $stmt->bind_param("s", $texto);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if($stmt->affected_rows){
            $respuesta = array(
                'respuesta' => 'exito',
                'id_admin' => $id_registro
            );
         // die(json_encode($respuesta));
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
        $stmt = $conn->prepare('DELETE FROM notas WHERE id_notas = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if ($id_borrar > 0) {
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
