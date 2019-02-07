<?php

// Oculta numeros de la cuenta bancaria
function hiddenString($str, $start = 1, $end = 1){
    $len = strlen($str);
    return substr($str, 0, $start) . str_repeat('*', $len - ($start + $end)) . substr($str, $len - $end, $end);
}

// Datos que faltan en la ficha
function datos_pendiente($id_trabajador){

    $datos_pendientes = datos_pendientes($id_trabajador);
    if($datos_pendientes->num_rows){ 

    foreach($datos_pendientes as $trabajadores) {
  
 
    // if($trabajadores['url_foto'] == ""){
    //     $url_foto = "-Foto Perfil <br>";
    if($trabajadores['segundo_apellido'] == ""){
        $apellido = "<br>-Apellido 2 <br>";
    } if($trabajadores['email'] == ""){
        $email = "-Email <br>";
    } if($trabajadores['banco'] == ""){
       $banco = "-Banco <br>"; 
    } if($trabajadores['ss'] == ""){
        $ss = "-SS <br>";
    } if($trabajadores['tlf'] == ""){
        $tlf = "-Telefono <br>";
    // } if($trabajador['url_dni_1'] == ""){
    //     $dni1 = "-DNI <br>";
    // } if($trabajador['url_dni_2'] == ""){
    //     $dni2 = "-DNI Cara 2 <br>";
    // } if($trabajador['url_banco'] == ""){
    //     $foto_cuenta = "-Foto banco <br>";
    // }
      
      $respuesta = $apellido . $email . $banco . $ss . $tlf;

}}  
   
    echo ($respuesta);
   
}
}



  