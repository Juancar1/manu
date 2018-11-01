<?php
$id_trabajador = $_GET['id'];

// if (!filter_var($id_fiesta, FILTER_VALIDATE_INT)) {
//   die("Error");
// }
      include_once 'funciones/sesiones.php';
      include_once 'funciones/conexion.php';
      include_once 'templates/header.php';
      include_once 'templates/barra.php';
      include_once 'templates/navegacion.php';
      if(($_SESSION['acceso_administrador']) == 1):?>
?>



  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Servicio de mail
        <small>Vas fiestas asignadas a este trabajador</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box primary">
        <div class="box-body">

            

           <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">

            <?php
               try {
                $sql = " SELECT nombre, primer_apellido, segundo_apellido, email, url_foto from trabajadores ";
                $sql .= " WHERE id_trabajador = $id_trabajador ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }
              while ($trabajador = $resultado->fetch_assoc()) { ?>
            <h3 class="box-title">Envío de fiestas asignadas a  <?php echo $trabajador['nombre'] . "  " . $trabajador['primer_apellido']. "  " . $trabajador['segundo_apellido']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="Para:" value="<?php echo $trabajador['email'] ?>" id="email">
              </div>
               <?php } ?>
              <div class="form-group">
                <input class="form-control" placeholder="Motivo:" value="Envío de fiestas asignadas">
              </div>
              <div class="form-group">
              <textarea id="compose-textarea" name="textarea" class="form-control compose-textarea" style="height: 300px">

              <div class="box-body no-padding">
                  <h1>Hola </h1><br>
                      <h2><u>Estas son tus fiestas asignadas</u></h1>
                      <br>
                      <p>Revisa minuciosamente todos los datos</p>

                    <?php
                      try {
                        $sql = " SELECT id_fiesta, nombre_evento, nombre_sala, fecha, hora_inicio, archivado, id_asignaciones, trabajador_id, fiesta_id, puesto_id, id_trabajador, nombre, primer_apellido, segundo_apellido ";
                        $sql .= " FROM fiestas ";
                        $sql .= " INNER JOIN asignaciones ";
                        $sql .= " ON fiestas.id_fiesta=asignaciones.fiesta_id ";
                        $sql .= " INNER JOIN trabajadores ";
                        $sql .= " ON asignaciones.trabajador_id=trabajadores.id_trabajador ";
                        $sql .= " WHERE id_trabajador = $id_trabajador and archivado = 0 ";


                        $resultado = $conn->query($sql);
                      } catch (Exception $e) {
                        $error = $e->getMessage();
                        echo $error;
                      }?>

                     <?php while ($asignaciones = $resultado->fetch_assoc()) { ?>

                      <br>
                     
                      <ul>  
                        <li>Nombre evento:  <?php echo $asignaciones['nombre_evento']  ?></li>
                        <li>Nombre sala:  <?php echo $asignaciones['nombre_sala']  ?></li>
                        <li>Fecha:  <?php echo $asignaciones['fecha']  ?></li>
                        <li>Hora:  <?php echo $asignaciones['hora_inicio']  ?></li>
                      </ul>
                        <br>

                        
                 <?php } ?>

                      <p>Si hay algún error, puedes contestar a este email detallando que dato hay que corregir o actualizar a la mayor brevedad posible</p>
                      <p>Muchas gracias por tu tiempo</p>
                      <p>Atentamente, Manu García</p>
                    </textarea>
                   </div>
             
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button id="enviar-email-asignaciones" tipo="email-asignaciones" id-trabajador="<?php echo $id_trabajador ?>"  type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
              </div>
              <div>
              <a href="ver-trabajador.php?id=<?php echo $id_trabajador ?>" class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
              </div>
            </div>

      </div>
      <!-- /.box -->

     </section>
     </div>

    
    <!-- /.content -->
  </div>



<?php include_once 'templates/footer.php'; 
endif;?>