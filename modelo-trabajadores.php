<?php


if(isset ($_POST['registro']) == 'eliminar') {

  
   
    $id_borrar = $_POST['id'];
    $id_borrar =  filter_var($id_borrar, FILTER_VALIDATE_INT);

    try {
        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare('DELETE FROM trabajadores WHERE id_trabajador = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if ($stmt->execute()) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_eliminado' => $id_borrar
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


}



if ($_POST['registro_trabajador'] == 'nuevo') {

    // $respuesta = array(
    //     'post' => $_POST,
    //     'files' => $_FILES
    // );
    // die(json_encode($respuesta));


   $nombre = htmlspecialchars($_POST['nombre']); 
   $nombre = ucwords(strtolower($nombre));
   $primer_apellido = htmlspecialchars($_POST['primer_apellido']);
   $primer_apellido = ucwords(strtolower($primer_apellido));
   $segundo_apellido = htmlspecialchars($_POST['segundo_apellido']);
   $segundo_apellido = ucwords(strtolower($segundo_apellido));
   $dni = htmlspecialchars($_POST['dni']);
   $banco = htmlspecialchars($_POST['banco']);
   $ss = htmlspecialchars($_POST['ss']);
   $telefono = filter_var($_POST['telefono'], FILTER_VALIDATE_INT);
   $email = htmlspecialchars($_POST['email']);
   $observaciones = htmlspecialchars($_POST['observaciones']);
   $imagen_url1 = htmlspecialchars($dni) . "_1.jpg";
   $imagen_url2 = htmlspecialchars($dni) . "_2.jpg";
   $imagen_url3 = htmlspecialchars($dni) . "_3.jpg";
   $imagen_url4 = htmlspecialchars($dni) . "_4.jpg";

    //imagenes
   $directorio = "img/trabajadores/";

   if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
   }

   // dni cara A
   if(move_uploaded_file($_FILES['archivo_imagen1']['tmp_name'], $directorio . $dni . "_1.jpg")){
       $imagen_url1 = $dni . "_1.jpg";
       $imagen_resultado1 = "Se subió correctamente";
   } else {
       $repuesta = array(
            'respuesta' => error_get_last()
       );
   }
   // dni cara B
   if(move_uploaded_file($_FILES['archivo_imagen2']['tmp_name'], $directorio . $dni . "_2.jpg")){
        $imagen_url2 = $dni . "_2.jpg";
        $imagen_resultado2 = "Se subió correctamente";
    } else {
        $repuesta = array(
            'respuesta' => error_get_last()
        );
    }
    // foto trabajador
    if(move_uploaded_file($_FILES['archivo_imagen3']['tmp_name'], $directorio . $dni . "_3.jpg")){
        $imagen_url3 = $dni .  "_3.jpg";
        $imagen_resultado3 = "Se subió correctamente";
    } else {
        $repuesta = array(
            'respuesta' => error_get_last()
        );
    }
    // foto banco
    if(move_uploaded_file($_FILES['archivo_imagen4']['tmp_name'], $directorio . $dni . "_4.jpg")){
        $imagen_url4 = $dni .  "_4.jpg";
        $imagen_resultado3 = "Se subió correctamente";
    } else {
        $repuesta = array(
            'respuesta' => error_get_last()
        );
    }



    try {
        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare('INSERT INTO trabajadores (nombre, primer_apellido, segundo_apellido, dni, url_dni_1, url_dni_2, banco, ss, tlf, email, url_foto, editado, observaciones, url_banco) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?) ');
        $stmt->bind_param('sssssssssssss', $nombre, $primer_apellido, $segundo_apellido, $dni, $imagen_url1, $imagen_url2, $banco, $ss, $telefono, $email, $imagen_url3, $observaciones, $imagen_url4);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if ($stmt->execute()) {
            $respuesta = array(
                'respuesta' => 'exitoso',
                'id_insertado' => $id_insertado,
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
