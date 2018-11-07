<?php 
//crea un nuevo usuario y contraseña
if ($_POST['registro'] == 'nuevo-admin') {
   
    $usuario = htmlspecialchars($_POST['nombre']);
    $password = htmlspecialchars($_POST['password']);
    $id_trabajador = filter_var($_POST['id_trabajador'], FILTER_VALIDATE_INT);
    $acceso_administrador = 0;
    
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
                'respuesta' => 'exito-admin',
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

    
    $id_borrar = filter_var($_POST['id'], FILTER_VALIDATE_INT);

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




