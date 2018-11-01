<?php




// asignar un puesto al trabajador
if(isset($_POST['puesto'])){

  
       
        $id_fiesta = filter_var($_POST['id_fiesta'], FILTER_VALIDATE_INT);
        $id_trabajador = filter_var($_POST['id_trabajador'], FILTER_VALIDATE_INT);
      
                    include_once 'funciones/conexion.php';
                    $sql = "SELECT COUNT(id_asignaciones) AS asignacion FROM asignaciones where fiesta_id = $id_fiesta and trabajador_id = $id_trabajador ";
                    $resultado = $conn->query($sql);
                    $puestos = $resultado->fetch_assoc();

            if($puestos['asignacion'] == 0){

                    $id_puesto = filter_var($_POST['puesto'], FILTER_VALIDATE_INT);
                    $id_fiesta = filter_var($_POST['id_fiesta'], FILTER_VALIDATE_INT);
                    $id_trabajador = filter_var($_POST['id_trabajador'], FILTER_VALIDATE_INT);
                    $email_enviado = 0;
                    $fichado = 0;

          
                try {

                    $stmt = $conn->prepare("INSERT INTO asignaciones (trabajador_id, fiesta_id, puesto_id,email_env, fichado, editado) VALUES (?, ?, ?, ?, ?, NOW()) ");
                    $stmt->bind_param("iiiii", $id_trabajador, $id_fiesta, $id_puesto, $email_enviado, $fichado);
                    $stmt->execute();
                    $id_registro = $stmt->insert_id;
                    if($id_registro > 0){
                        $respuesta = array(
                            'respuesta' => 'exito',
                            'id_admin' => $id_registro
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
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
                die(json_encode($respuesta));
            }
            

        

        