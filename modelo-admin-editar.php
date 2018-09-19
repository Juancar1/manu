<?php

if (isset($_POST['contraseña']) == 'modificar') {

    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $id_admin = 1;

    $opciones = array(
        'cost' => 12
    );

    $password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);
    

    try {
    
        include_once 'funciones/conexion.php';
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

} catch (Exception $e) {
    $respuesta = array(
        'respuesta' => 'error'
    );
}
die(json_encode($respuesta));
}


    $id_admin = $_POST['id_admin'];
    $acceso = $_POST['acceso'];


try {
    
        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare("UPDATE admins SET acceso_administrador = ? WHERE id_admin = ? ");
        $stmt->bind_param("ii", $acceso, $id_admin);
   

    $estado = $stmt->execute();
    
    if ($estado == true) {
        $respuesta = array(
            'respuesta' => 'exito',
            'id_actualizado' => $id_admin,
            'acceso' => $acceso
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

