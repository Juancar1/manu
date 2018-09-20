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
?>
    
          <div id="content">
             <div class="content-wrapper">
                 <!-- Main content -->
                   <section class="invoice">
                      <div class="row">
                          <div class="col-xs-8">
                                <?php
                try {
                $sql = " SELECT nombre, primer_apellido, segundo_apellido, dni, url_dni_1, url_dni_2, banco, ss, tlf, email, url_foto, editado, observaciones, ultimo_email_ficha, ultimo_email_asignaciones from trabajadores ";
                $sql .= " WHERE id_trabajador = $id_trabajador ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }
              while ($trabajador = $resultado->fetch_assoc()) { ?>

                    <!-- Content Wrapper. Contains page content -->

                    <h2 class="page-header">
                    <i class="far fa-user"></i> <?php echo $trabajador['nombre'] . " / " . $trabajador['primer_apellido'] . " " . $trabajador['segundo_apellido']; ?>
                    </h2>
                    </div>              
                    <!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-xs-8 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>DNI</th>
                                <th>Banco</th>
                                <th>SS</th>
                                <th>Tlf</th> 
                            </tr>
                        </thead>
                        <br>
                <!-- Table row -->
                        <div> <img src="img/trabajadores/<?php echo $trabajador['url_foto']; ?>" width="150px"></div>
                        <br>
                        <?php
                        if(isset($banco)){
                        $banco = $trabajador['banco'];
                        function hiddenString($str, $start = 1, $end = 1){
                            $len = strlen($str);
                            return substr($str, 0, $start) . str_repeat('*', $len - ($start + $end)) . substr($str, $len - $end, $end);
                        }
                        }
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $trabajador['email'] ;  ?></td>
                                <td><?php echo $trabajador['dni'] ?></td>
                                <?php if(isset($banco)) { ?>
                                <td><?php echo hiddenString($banco,0,5); ?></td>
                                <?php } ?>
                                <td><?php echo $trabajador['ss'] ?></td>
                                <td><?php echo $trabajador['tlf'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        
        <!-- /.col -->
        <div class="col-xs-10">
          <p class="lead">Foto DNI</p>
          <div class="table-responsive">
            <table class="table">
              <tr class="col-xs-6">
                <th style="width:50%">Cara A</th>
                <td><img src="img/trabajadores/<?php echo $trabajador['url_dni_1']; ?>" width="150px"></td>
              </tr>
              <tr class="col-xs-6">
                <th style="width:50%">Cara B</th>
                <td><img src="img/trabajadores/<?php echo $trabajador['url_dni_2']; ?>" width="150px"></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="col-xs-8">
            <div class="table-responsive">
                <table>
                    <tr>
                        <td> <p class="lead">Observaciones</p><?php echo $trabajador['observaciones'];  ?></td>
                    </tr>
                    <tr><?php 
                        setlocale(LC_ALL,"es_ES");
                        $fecha_formateada =  strftime("%A, %d %B %G", strtotime($trabajador['editado']));
                    ?>
                        <th>Ultima actualización<br><small><?php echo $fecha_formateada; ?></small></th>
                    </tr><?php
                        setlocale(LC_ALL,"es_ES");
                        $fecha_formateada2 =  strftime("%A, %d %B %G", strtotime($trabajador['ultimo_email_ficha']));?>
                    <tr>
                        <th>Ulimo email enviado "Ficha"<br><small><?php echo $fecha_formateada2; ?></small></th>
                    </tr><?php
                        setlocale(LC_ALL,"es_ES");
                        $fecha_formateada3 =  strftime("%A, %d %B %G", strtotime($trabajador['ultimo_email_asignaciones']));?>
                    <tr>
                        <th>Ulimo email enviado "Fiestas"<br><small><?php echo $fecha_formateada3; ?></small></th>
                    </tr>
                </table>
            </div>
        </div>
        <!-- /.col -->
      </div>  
      <br>
   
      <!-- this row will not appear when printing -->
     
      <div class="row no-print">
        <div class="col-xs-12">
        <a href="lista-trabajadores.php"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
          <a href="ver-trabajador-print.php?id=<?php echo $id_trabajador ?>" id="imprimir" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
          <a href="editar-trabajador.php?id=<?php echo $id_trabajador ?>" class="btn btn-default"><i class="far fa-edit"></i> Editar</a>
          <button id="" type="button" class="btn btn-info pull-right" style="margin-right: 5px;">
          <a href="mail-ficha.php?id=<?php echo $id_trabajador ?>"><i class="fa fa-download"></i> Enviar email</a>
          </button>
          <button id="cmd" type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generar PDF
          </button>
        </div>
      </div>
          
    <?php } ?>   </section>
    <br><br>

 
 <div class="row">
     <div class="col-md-11">
         <div class="box lista_asignaciones">
     <div Class="h1_asignacion">
     <h1>Fiestas asignadas pendientes de trabajar</h1>
     </div><br>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed tabla-asignacion">
                <tr>
                  <th>Nombre Fiesta</th>
                  <th>Sala</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Email enviado</th>
                </tr>


                    <?php 
                    try {
                        $sql = " SELECT id_fiesta, nombre_evento, nombre_sala, fecha, hora_inicio, archivado, id_asignaciones, trabajador_id, fiesta_id, puesto_id, id_trabajador, nombre, primer_apellido, segundo_apellido, email_enviado ";
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
                    }
      while ($asignaciones = $resultado->fetch_assoc()) { ?>

                <tr>
                  <td> <?php echo $asignaciones['nombre_evento'];  ?></td>
                  <td><?php echo $asignaciones['nombre_sala'];  ?></td>
                  <td><?php echo $asignaciones['fecha'];  ?></td>
                  <td><?php echo $asignaciones['hora_inicio'] ; ?></td>
                  <td><?php echo $asignaciones['email_enviado'] ; ?></td>
                </tr>
                 <?php } ?>
              </table>
             
           
            <!-- /.box-body -->
         <br><br><br>
        
        <div class="col-xs-12">
        <a href="lista-trabajadores.php"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
        <button id="" type="button" class="btn btn-info pull-right" style="margin-right: 5px;">
          <a href="mail-asignaciones.php?id=<?php echo $id_trabajador ?>"><i class="fa fa-download"></i> Enviar email</a>
          </button>
        </div>
      </div>
      </div>
          </div>
    
  <div class="control-sidebar-bg"></div>
  </div>
</div>

<div id="editor"></div>



<script>

</script>
<?php include_once 'templates/footer.php'; ?>



