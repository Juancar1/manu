<?php
// Consulta SQL lista trabajadores "ver-trabajador-php"
function trabajador($id_trabajador){
    include 'conexion.php';
    try {
        return $conn->query("SELECT nombre, primer_apellido, segundo_apellido, dni, url_dni_1, url_dni_2, banco, ss, tlf, email, url_foto, editado, ultimo_email_ficha, url_banco, observaciones from trabajadores WHERE id_trabajador = $id_trabajador ");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

// Consulta SQL fiestas asignadas "ver-trabajador.php"
function asignacion($id_trabajador){
    include 'conexion.php';
    try {
        return $conn->query("SELECT id_fiesta, nombre_evento, nombre_sala, fecha, hora_inicio, archivado, id_asignaciones, trabajador_id, fiesta_id, puesto_id, id_trabajador, nombre, primer_apellido, segundo_apellido, hora_fichado, ultimo_email_asignaciones FROM fiestas INNER JOIN asignaciones ON fiestas.id_fiesta=asignaciones.fiesta_id INNER JOIN trabajadores ON asignaciones.trabajador_id=trabajadores.id_trabajador WHERE id_trabajador = $id_trabajador and archivado = 0 ");
        } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

// Consulta SQL fiestas asignadas (contando el número) "ver-trabajador.php"
function asignacion_numero($id_trabajador){
    include 'conexion.php';
    try {
        return $conn->query("SELECT count(*) FROM fiestas INNER JOIN asignaciones ON fiestas.id_fiesta=asignaciones.fiesta_id INNER JOIN trabajadores ON asignaciones.trabajador_id=trabajadores.id_trabajador WHERE id_trabajador = $id_trabajador and archivado = 0 ");
        } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

// Consulta SQL fiestas ya trabajadas "ver-trabajador.php
function trabajadas($id_trabajador){
    include 'conexion.php';
    try {
        return $conn->query("SELECT id_fiesta, nombre_evento, nombre_sala, fecha, hora_inicio, archivado, id_asignaciones, trabajador_id, fiesta_id, puesto_id, id_trabajador, nombre, primer_apellido, segundo_apellido, hora_fichado FROM fiestas INNER JOIN asignaciones ON fiestas.id_fiesta=asignaciones.fiesta_id INNER JOIN trabajadores ON asignaciones.trabajador_id=trabajadores.id_trabajador WHERE id_trabajador = $id_trabajador and archivado = 3 ");
        } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}
// Datos pendientes de la ficha "ver-trabajador.php"
function datos_pendientes($id_trabajador){
    include 'conexion.php';
    try {
        return $conn->query("SELECT nombre, primer_apellido, segundo_apellido, dni, url_dni_1, url_dni_2, banco, ss, tlf, email, url_foto, editado, ultimo_email_ficha, url_banco, observaciones from trabajadores WHERE id_trabajador = $id_trabajador ");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}
// Notas "notas.php" 
function notas(){
    include 'conexion.php';
    try {
        return $conn->query("SELECT id_notas, text, editado FROM notas ");
    } catch (Exception $e) {
        echo "Error!!" . $e->getMessage() . "<br>";
        return false;
    }
}

