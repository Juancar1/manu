<?php



// asignar un puesto al trabajador
if(isset($_POST['puesto'])){

        $id_puesto = $_POST['puesto'];
        $id_fiesta = $_POST['id_fiesta'];
        $id_trabajador = $_POST['id_trabajador'];

        


try {

    include_once 'funciones/conexion.php';
    $stmt = $conn->prepare("INSERT INTO asignaciones (trabajador_id, fiesta_id, puesto_id, editado) VALUES (?, ?, ?, NOW()) ");
    $stmt->bind_param("iii", $id_trabajador, $id_fiesta, $id_puesto);
    $stmt->execute();
    $id_registro = $stmt->insert_id;
    if($id_registro > 0){
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


if(isset($_POST['id_asignaciones'])){
    
    $id_asignaciones = $_POST['id_asignaciones'];
    $fichado = 1;

    try {
        include_once 'funciones/conexion.php';
        
            $stmt = $conn->prepare("UPDATE asignaciones SET fichado = ?, hora_fichado = NOW() WHERE id_asignaciones = $id_asignaciones ");
            $stmt->bind_param('i', $fichado);
        
            $estado = $stmt->execute();
         
         if ($estado == true) {
             $respuesta = array(
                 'respuesta' => 'fichado',
                 'id_fichado' => $id_asignaciones
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