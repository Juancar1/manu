<?php


//verifica el usuario y contraseña
if (isset($_POST['login-admin'])) {
   
    $usuario = htmlspecialchars($_POST['usuario']);
    $password = htmlspecialchars($_POST['password']);
  

    try {

        include_once 'funciones/conexion.php';
        $stmt = $conn->prepare("SELECT * FROM admins WHERE usuario = ? ");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $password_admin, $acceso_administrador, $trabajador_id);
        if ($stmt->affected_rows) {
            $existe = $stmt->fetch();
            if ($existe) {
                if (password_verify($password, $password_admin)) {

                    session_start();
                    $_SESSION['usuario'] = $usuario_admin;
                    $_SESSION['id'] = $id_admin;
                    $_SESSION['acceso_administrador'] = $acceso_administrador;
                    $_SESSION['trabajador_id'] = $trabajador_id;

                    $respuesta = array(
                        'respuesta' => 'exitoso',
                        'usuario' => $usuario_admin
                    );
                } else {
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            } else {
                $respuesta = array(
                    'respuesta' => 'error',

                );
            }
        }
        $stmt->close();
        $conn->close();
    } catch (exception $e) {
        echo "Error: " . $e->getMessage();
    }

    die(json_encode($respuesta));

}