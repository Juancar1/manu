<?php


// fiesta activa archivado n 2 (se activa la fiesta para fichar)
if($_POST['archivado'] == 2) {

        $id_fiesta = filter_var($_POST['id_fiesta'], FILTER_VALIDATE_INT);
        $archivado = 2;

try {
    include_once 'funciones/conexion.php';
    
        $stmt = $conn->prepare('UPDATE fiestas SET archivado = ? WHERE id_fiesta = ? ');
        $stmt->bind_param('ii', $archivado, $id_fiesta);
    
        $estado = $stmt->execute();
     
     if ($estado == true) {
         $respuesta = array(
             'respuesta' => 'archivado'
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

}



 // fiesta pasa a fiestas antiguas (archivado nº3)
 if($_POST['archivado'] == 3) {

    
        $observaciones = filter_var($_POST['observaciones'], FILTER_SANITIZE_STRING);
        $id_fiesta = filter_var($_POST['id_fiesta'], FILTER_VALIDATE_INT);
        $archivado = 3;


    try {
        include_once 'funciones/conexion.php';
        
            $stmt = $conn->prepare('UPDATE fiestas SET archivado = ?, observaciones_final = ? WHERE id_fiesta = ? ');
            $stmt->bind_param('isi', $archivado, $observaciones, $id_fiesta);
        
            $estado = $stmt->execute();
         
         if ($estado == true) {
             $respuesta = array(
                 'respuesta' => 'archivada'
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
    
}
