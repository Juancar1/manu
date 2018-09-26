<?php

$id_fiesta = $_GET['id'];

        include_once 'funciones/sesiones.php';
        include_once 'funciones/conexion.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
        if(($_SESSION['acceso_administrador']) == 1):?>


<div id="content">
                    <div class="content-wrapper">
                            <!-- Main content -->
          <section class="invoice">
              <div class="row">
                 <div class="col-xs-12">
   <?php



                try {
                $sql = " SELECT id_fiesta, nombre_evento, nombre_sala, fecha, hora_inicio from fiestas ";
                $sql .= " WHERE id_fiesta = $id_fiesta ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }

              while ($fiestas = $resultado->fetch_assoc()) { 
                
                    setlocale(LC_ALL,"es_ES");
                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($fiestas['fecha']));?>

         
                    <!-- Content Wrapper. Contains page content -->
       

                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> <?php echo $fiestas['nombre_evento'] . " / " . $fiestas['nombre_sala']; ?>
                        <small class="pull-right"><i class="far fa-calendar-alt"></i><?php echo $fecha_formateada  ?>
                        <i class="far fa-clock"></i><?php echo $fiestas['hora_inicio']; ?>
                        </small>
                    </h2>
                    </div>
                  <?php } ?>
                    <!-- /.col -->
                </div>


                <div class="row">
                    <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Tlf</th>
                                <th>Puesto</th>
                                <th>Email</th>
                                <th>Email enviado</th>
                            </tr>
                        </thead>




                    <?php
              try {
                $sql = " SELECT id_trabajador, hora_fichado, nombre, primer_apellido, segundo_apellido, dni, banco, ss, tlf, email, id_asignaciones, trabajador_id, fiesta_id, puesto_id, id_puestos, nombre_puesto, email_env ";
                $sql .= " FROM trabajadores ";
                $sql .= " INNER JOIN asignaciones ";
                $sql .= " ON asignaciones.trabajador_id=trabajadores.id_trabajador ";
                $sql .= " INNER JOIN puestos ";
                $sql .= " ON puestos.id_puestos=asignaciones.puesto_id ";
                $sql .= " WHERE fiesta_id = $id_fiesta ";
                

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }

              while ($datosFiestas = $resultado->fetch_assoc()) { 

                    if($datosFiestas['email_env'] == 0){
                        $email_enviado = "No";
                    } else {
                        $email_enviado = "Si";
                    }
                    ?>
                <!-- Table row -->
                
                        <tbody>
                                <tr>
                                <td onclick="window.location='ver-trabajador.php?id=<?php echo $datosFiestas['id_trabajador']; ?>';"><a><?php echo $datosFiestas['nombre']; ?></a></td>
                                <td><?php echo $datosFiestas['primer_apellido'] . " " . $datosFiestas['segundo_apellido'];  ?></td>
                                <td><?php echo $datosFiestas['tlf'] ?></td>
                                <td><?php echo $datosFiestas['nombre_puesto'] ?></td>
                                <td><?php echo $datosFiestas['email'] ?></td>
                                <td><?php echo $email_enviado; ?></td>
                            </tr>
                           
                        </tbody>

                         <?php } ?>
                       
                    </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
      <div class="row no-print">
        <div class="col-xs-12">
        <a href="lista-asignacion.php"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
          <a href="ver-fiestas-print.php?id=<?php echo $id_fiesta ?>" id="imprimir" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
          <a href="ver-fiestas.php?id=<?php echo $id_fiesta ?>"  class="btn btn-default"><i class="fas fa-caret-right"></i> Datos completos</a>
          </button>
          <button id="cmd" type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generar PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <div class="control-sidebar-bg"></div>

</div>
<div id="editor"></div>
<script>

</script>
<?php include_once 'templates/footer.php'; 
endif;?>



