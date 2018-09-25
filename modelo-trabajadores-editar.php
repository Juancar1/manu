<?php

//  $respuesta = array(
//         'post' => $_POST,
//         'file' => $_FILES
//     );
//     die(json_encode($respuesta));

   $nombre = $_POST['nombre']; 
   $nombre = ucwords(strtolower($nombre));
   $primer_apellido = $_POST['primer_apellido'];
   $primer_apellido = ucwords(strtolower($primer_apellido));
   $segundo_apellido = $_POST['segundo_apellido'];
   $segundo_apellido = ucwords(strtolower($segundo_apellido));
   $dni = $_POST['dni'];
   $banco = $_POST['banco'];
   $ss = $_POST['ss'];
   $telefono = $_POST['telefono'];
   $email = $_POST['email'];
   $observaciones = $_POST['observaciones'];
   $id_registro = $_POST['id'];
   $imagen_url1 = $dni . "_1.jpg";
   $imagen_url2 = $dni . "_2.jpg";
   $imagen_url3 = $dni . "_3.jpg";
   $imagen_url4 = $dni . "_4.jpg";
  



    //imagenes
   $directorio = "img/trabajadores/";

   if(!is_dir($directorio)){
        mkdir($directorio, 0755, true);
   }

   // dni cara A
   if(move_uploaded_file($_FILES['archivo_imagen1']['tmp_name'], $directorio . $dni . "_1.jpg")){
       $imagen_resultado1 = "Se subió correctamente";
   } else {
       $repuesta = array(
            'respuesta' => error_get_last()
       );
   }
   // dni cara B
   if(move_uploaded_file($_FILES['archivo_imagen2']['tmp_name'], $directorio . $dni . "_2.jpg")){
        $imagen_resultado2 = "Se subió correctamente";
    } else {
        $repuesta = array(
            'respuesta' => error_get_last()
        );
    }
    // foto trabajador
    if(move_uploaded_file($_FILES['archivo_imagen3']['tmp_name'], $directorio . $dni . "_3.jpg")){
        $imagen_resultado3 = "Se subió correctamente";
    } else {
        $repuesta = array(
            'respuesta' => error_get_last()
        );
    }
    // foto banco
    if(move_uploaded_file($_FILES['archivo_imagen4']['tmp_name'], $directorio . $dni . "_4.jpg")){
        $imagen_resultado4 = "Se subió correctamente";
    } else {
        $repuesta = array(
            'respuesta' => error_get_last()
        );
    }

 
     try {
        include_once 'funciones/conexion.php';
        
            $stmt = $conn->prepare('UPDATE trabajadores SET nombre = ?, primer_apellido = ?, segundo_apellido = ?, dni = ?, banco = ?, ss = ?, tlf = ?, email = ?, editado = NOW(), observaciones = ?, url_banco = ? WHERE id_trabajador = ? ');
            $stmt->bind_param('ssssssssssi', $nombre, $primer_apellido, $segundo_apellido, $dni, $banco, $ss, $telefono, $email, $observaciones, $imagen_url4, $id_registro);
        
            $estado = $stmt->execute();
         
         if ($estado == true) {
             $respuesta = array(
                 'respuesta' => 'exitoso',
                 'id_actualizado' => $id_registro,
             );
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
 
 
 