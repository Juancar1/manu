<?php

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