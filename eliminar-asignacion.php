<?php

$id_fiesta = $_GET['id'];
if (!filter_var($id_fiesta, FILTER_VALIDATE_INT)) {
  die("Error");
}
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Elimina trabajadores de esta fiesta
        <small></small>
      </h1>
    </section>
    <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo-evento.php">
     
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
      <!-- centro -->
      <div class="row">
       <div class="col-xs-12">
            <div class="box">

              <?php
              try {
                $sql = " SELECT id_fiesta, nombre_evento, fecha, hora_inicio, observaciones ";
                $sql .= " FROM fiestas ";
                $sql .= " WHERE id_fiesta = $id_fiesta ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }

              while ($fiestas = $resultado->fetch_assoc()) { 
                
                    setlocale(LC_ALL,"es_ES");
                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($fiestas['fecha']));?>

                    <div class="box-header">
                        <h3 class="box-title">
                
                    <tr>
                        <td><?php echo $fiestas['nombre_evento']; ?></td><br>
                        <td>Fecha <?php echo $fecha_formateada; ?></td><br>
                        <td>Hora de inicio: <?php echo $fiestas['hora_inicio']; ?></td><br>
                    </tr>
                        </h3>
                <?php 
              } ?>
       

            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>DNI</th>
                  <th>Foto</th>
                  <th>Borrar</th>
                </tr>
              <?php
              
              try {
                  $sql = 'SELECT id_trabajador, nombre, primer_apellido, dni, url_foto, segundo_apellido, trabajador_id, fiesta_id, id_fiesta ';      
                  $sql .= ' FROM trabajadores ';
                  $sql .= ' INNER JOIN asignaciones ';
                  $sql .= ' ON trabajadores.id_trabajador=asignaciones.trabajador_id ';
                  $sql .= ' INNER JOIN fiestas ';
                  $sql .= ' ON fiestas.id_fiesta=asignaciones.fiesta_id ';
                  $sql .= " WHERE id_fiesta = $id_fiesta ";

                  $resultado = $conn->query($sql);
              } catch (Exception $e) {
                  $error = $e->getMessage();
              } ?><tbody><?php
               while ($trabajadores = $resultado->fetch_assoc()) {?>

                <tr id="<?php $trabajadores['id_trabajador'] ?>">
                  <td><p><?php echo $trabajadores['nombre']; ?> 
                  </td>
                  <td><p><?php echo $trabajadores['primer_apellido'] . " " . $trabajadores['segundo_apellido']; ?></p></td>
                  <td><?php echo $trabajadores['dni']; ?></td>
                  <td><img src="img/trabajadores/<?php echo $trabajadores['url_foto']; ?>" width="150px"></td>
                  <td>
                   <a href="#" id-trabajador="<?php echo $trabajadores['id_trabajador']; ?>" name="asignaciones-eliminar" id-fiesta="<?php echo $_GET['id']; ?>" 
                    nombre-trabajador="<?php echo $trabajadores['nombre'] . " " . $trabajadores['primer_apellido']; ?>"  class="btn bg-red bnt-flat margin eliminar_asignacion">
                    <i class="fas fa-minus"></i>
                  </td>
                  
                </tr>
                <?php } ?> 
                </tbody>
              </table>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><!-- row-->
    </div><!-- /.content-wrapper -->
               </form>
               </div>
               <a href="lista-asignacion.php"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
    </section>
  </div><!-- col 12-->

<?php include_once 'templates/footer.php'; ?>



