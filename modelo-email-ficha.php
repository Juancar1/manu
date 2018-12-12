<?php


$textarea = $_POST['textarea'];
$id_trabajador = filter_var($_POST['id_trabajador'], FILTER_VALIDATE_INT);
$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);


                $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; ISO-8859-1 a UTF-8' . "\r\n";
                $cabeceras .= 'From: <juancarpliego@gmail.com>' . "\r\n";


                 $bool = mail($email, "Datos personales", $textarea, $cabeceras);
                
                 if($bool){
                    

            try {
                 include_once 'funciones/conexion.php';
                 $stmt = $conn->prepare("UPDATE trabajadores SET ultimo_email_ficha = NOW() WHERE id_trabajador = ? ");
                 $stmt->bind_param("i", $id_trabajador);

                $estado = $stmt->execute();

            if ($estado == true) {
                $respuesta = array(
                    'respuesta' => 'exito'
                    
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();

            } catch (Exception $e) {
            $respuesta = array(
                'respuesta' => 'error'
            );
            }
            die(json_encode($respuesta));


           } else {
                     echo "error";  
                }