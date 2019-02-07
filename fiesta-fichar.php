<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
if(($_SESSION['acceso_administrador']) == 1):?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ficha a los trabajadores de esta fiesta
        <small></small>
      </h1>
    </section>

   
    <!-- Main content -->
    <section class="">
      <!-- Default box -->
      <div class="box">
      <!-- centro -->
      <div class="row">
       <div class="col-xs-12 fichar-superior">
            <div class="box">
            <?php
              try {
                $sql = " SELECT id_fiesta, nombre_sala, nombre_evento, fecha, hora_inicio, archivado, observaciones ";
                $sql .= " FROM fiestas ";
                $sql .= " WHERE archivado = 2 limit 1 ";
                
                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }
              
              while ($fiestas = $resultado->fetch_assoc()) { 
                    $id_fiesta = $fiestas['id_fiesta'];
                    setlocale(LC_ALL,"es_ES");
                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($fiestas['fecha']));?>

            
            <!-- /.box-header -->
            <div class="col-md-6 datos-fichar"><!--datos parte superior -->
            <div class="box-body ">
              <table class="table ">
                <tr>
                  <td>Nombre: </td>
                  <td class="centrar-texto"><?php echo $fiestas['nombre_evento']; ?></td>
                </tr>
                <tr>
                  <td>Sala: </td>
                  <td class="centrar-texto"><?php echo $fiestas['nombre_sala']; ?></td>
                </tr>
                <tr>
                  <td>Fecha: </td>
                  <td class="centrar-texto"><?php echo $fecha_formateada; ?></td> 
                </tr>
                <tr>
                  <td>Hora: </td>
                  <td class="centrar-texto"><?php echo $fiestas['hora_inicio']; ?></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
              </div><!-- datos parte superior -->


            <!-- /.box-body -->
          </div>
          <?php } ?>

             
                   
                
                 <div>
                  <div class="col-md-6 conteo">
                      <li class="user-body">
                <div class="row">
                <?php   if (isset($id_fiesta)){
                        $sql = "SELECT COUNT(id_asignaciones) AS asignados, fiesta_id FROM asignaciones WHERE fiesta_id = $id_fiesta ";
                        $resultado = $conn->query($sql);
                        $asignados = $resultado->fetch_assoc();
                        ?>
                  <div class="col-xs-4 text-center">
                    <a href="#">Contratados</a><br>
                    <span class="label label-success"><?php echo $asignados['asignados']; ?></span>
                  </div>
                  <div class="col-xs-4 text-center">
                  <?php 
                        $sql = "SELECT COUNT(id_asignaciones) AS asignados, fiesta_id, fichado FROM asignaciones WHERE fiesta_id = $id_fiesta and fichado = 1 ";
                        $resultado = $conn->query($sql);
                        $fichados = $resultado->fetch_assoc();
                        ?>
                    <a href="#">Fichados</a><br>
                    <span class="label label-success"><?php echo $fichados['asignados']; ?></span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <?php
                        $faltan = $asignados['asignados'] - $fichados['asignados'];
                        if ($faltan == 0){
                          $faltan = "Completada";
                        }
                    ?>
                    <a href="#">Faltan</a><br>
                    <span class="label label-success"><?php echo $faltan ?></span>
                  </div>
                        <?php
                            $contratados = $asignados['asignados'];
                            $fichados = $fichados['asignados'];
                            $porcentaje_completado = $fichados * 100 / $contratados;
                        ?>
                    <div class="col-xs-12 porcentaje">
                    <tr>
                      <td>Fichados: </td>
                      <td><span class="badge bg-green numero-porcentaje"><?php echo round($porcentaje_completado,2) . "%" ?></span></td>
                      <td><?php echo $fiestas['nombre_evento']; ?></td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-success" style="width: <?php echo round($porcentaje_completado,0) . "%" ?>"></div>
                        </div>
                      </td>
                    </tr>
                    </div>


                     <div class="col-xs-12 centrar-boton">
                    <tr>
                        <td>
                        <button id="<?php echo $id_fiesta ?>" type="button" class="btn btn-primary cerrar-fiesta">Cerrar fiesta</button>
                      </td>
                    </tr>
                    </div>
                   
                 
                    </div><!--row-->

                 <?php } else { ?>
                    <div>
                    <h1>No hay fiestas abiertas</h1>
                    </div>
                <?php } ?>
                </div>
                 </div>
                <!-- /.row -->
              </li>
          </div><!--col-md-6-->


            
               
            <!-- /.box-header -->
       
            <div class="box-body table-responsive">
              <table class="table table-hover fiesta-fichar">
                <tr>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th class="movil">DNI</th>
                  <th class="movil">Foto</th>
                  <th>Fichar</th>
                </tr>
              <?php
              if (isset($id_fiesta)){
              try {
                  $sql = " SELECT id_fiesta, id_asignaciones, trabajador_id, fecha, fiesta_id, puesto_id, url_foto, dni, fichado, hora_fichado, id_trabajador, nombre, primer_apellido, segundo_apellido, archivado ";
                  $sql .= " FROM trabajadores ";
                  $sql .= " INNER JOIN asignaciones ";
                  $sql .= " ON trabajadores.id_trabajador=asignaciones.trabajador_id ";
                  $sql .= " INNER JOIN fiestas ";
                  $sql .= " ON fiestas.id_fiesta=asignaciones.fiesta_id";
                  $sql .= " WHERE fiesta_id =  $id_fiesta and archivado = 2 and fichado = 0 ";
                  $sql .= " ORDER BY nombre ASC ";

                  $resultado = $conn->query($sql);
              } catch (Exception $e) {
                  $error = $e->getMessage();
              } ?><tbody><?php
              
               while ($fichar = $resultado->fetch_assoc()) {?>
                <tr>
                  <td><p><?php echo $fichar['nombre']; ?> 
                  </td>
                  <td><p><?php echo $fichar['primer_apellido'] . " " . $fichar['segundo_apellido']; ?></p></td>
                  <td class="movil"><?php echo $fichar['dni']; ?></td>
                  <td class="movil"><img src="img/trabajadores/<?php echo $fichar['url_foto']; ?>" width="100px"></td>
                  <td>
                   <a href="#" id="<?php echo $fichar['id_asignaciones']; ?>" nombre=<?php echo $fichar['nombre'] . " " . $fichar['primer_apellido'];  ?> class="btn bg-green bnt-flat margin ficha-trabajador">
                    <i class="far fa-check-circle"></i>
                  </td>
                  
                </tr>
                <?php } }?> 
                </tbody>
              </table>

               
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div><!-- row-->
    </div><!-- /.content-wrapper -->
     
               <div>
               <div>
               <a href="index.php"  class="btn btn-default">
                 <i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
              </div>
    </section>
  </div><!-- col 12-->

<?php include_once 'templates/footer.php'; 
endif;?>



