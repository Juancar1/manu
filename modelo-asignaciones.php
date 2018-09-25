<?php


include_once 'funciones/conexion.php';

// asignar un puesto al trabajador
if(isset($_POST['puesto'])){

  
        $id_puesto = $_POST['puesto'];
        $id_fiesta = $_POST['id_fiesta'];
        $id_trabajador = $_POST['id_trabajador'];
        $email_enviado = 0;
        $fichado = 0;
        $sql = "SELECT COUNT(*) FROM asignaciones a where a.trabajador_id = $id_trabajador and a.fiesta_id = $id_fiesta";
        $resultado = $conn->query($sql);
        $existe_usuario = $resultado->fetch_assoc();       
        var_dump($existe_usuario);


                try {

                    $stmt = $conn->prepare("INSERT INTO asignaciones (trabajador_id, fiesta_id, puesto_id, email_env, fichado, editado) VALUES (?, ?, ?, ?, ?, NOW()) ");
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


                if(isset($_POST['id_asignaciones'])){
                    
                    $id_asignaciones = $_POST['id_asignaciones'];
                    $fichado = 1;

                    try {
                        
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