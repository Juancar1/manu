<?php 

//crea un nuevo usuario y contraseña
if ($_POST['registro'] == 'nuevo') {
 
    $usuario = $_POST['nombre'];
    $password = $_POST['password'];
    $acceso_administrador = 0;
    $id_trabajador = $_POST['id_trabajador'];
    
    
    $opciones = array(
        'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);


    try {

        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare("INSERT INTO admins (usuario, password, acceso_administrador, trabajador_id) VALUES (?, ?, ?, ?) ");
        $stmt->bind_param("ssii", $usuario, $password_hashed, $acceso_administrador, $id_trabajador);
        $stmt->execute();
        $id_registro = $stmt->insert_id;
        if ($id_registro > 0) {
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


// elimina usuario y contraseña
if ($_POST['registro'] == 'eliminar') {

    
    $id_borrar = $_POST['id'];

    try{
        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare('DELETE FROM admins WHERE id_admin = ? ');
        $stmt->bind_param('i', $id_borrar);
        $stmt->execute();
        if($stmt->affected_rows){
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




