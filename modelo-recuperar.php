<?php
include_once 'templates/header.php';
include_once 'funciones/conexion.php';
$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
$id_admin = 1;?>


<body class="hold-transition lockscreen">

        <div class="lockscreen-wrapper">
                <div class="lockscreen-logo">
                    <a href=""><b>Manu</b> García</a>
                </div>

<?php if($usuario == 'caraban84@gmail.com'){ 

   
       
            $cadena = $usuario.rand(1,9999999) + 'AB__';
           
         

            $mensaje = '<html>
                <head>
                    <title>Restablece tu contraseña</title>
                </head>
                <body>
                    <p>Hemos recibido una petición para restablecer la contraseña de tu cuenta.</p>
                    <p>Te vamos a facilitar una contraseña temporal</p>
                    <p>
                    <strong>Puedes acceder con esta contrasña '.$cadena.'</strong><br>
                    <strong>IMPORTANTE: Cambia cuanto antes tu contraseña temporal en el apartado ajustes, esta contraseña no es segura</strong>
                    <p>Pincha aquí para acceder</p>  <a href="url">localhost:8888/manu</a>
                </body>
                </html>';
      
                $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $cabeceras .= 'From: <juancarpliego@gmail.com.com>' . "\r\n";


                // Se envia el correo al usuario
                if(mail($usuario, "Recuperar contraseña", $mensaje, $cabeceras)){?>
                <div class="lockscreen-name">Correcto, se ha enviado un email a tu correo</div>
                <?php
                } else {?>
                <?php echo "error";  
                }
            ?>
        <div class="lockscreen-item"></div> 
     </div>   
     <?php

      
        $opciones = array(
            'cost' => 12
        );

        $password_hashed = password_hash($cadena, PASSWORD_BCRYPT, $opciones);


         
     try {



        $stmt = $conn->prepare("UPDATE admins SET password = ? WHERE id_admin = ? ");
        $stmt->bind_param("si", $password_hashed, $id_admin);
   

        $estado = $stmt->execute();
    
        if ($estado == true) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_admin
           
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


                
      
        } else {?>
            <div class="lockscreen-name">El email introducido no es el correcto</div><?php
        }
     
?>
<?php include_once 'templates/footer.php'; ?>
