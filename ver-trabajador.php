<?php
$id_trabajador = $_GET['id'];

if (!filter_var($id_trabajador, FILTER_VALIDATE_INT)) {
  die("Error");
}
        include_once 'funciones/sesiones.php';
        include_once 'funciones/conexion.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
        if(($_SESSION['acceso_administrador']) == 1):?>
?>
    
          <div id="content">
             <div class="content-wrapper">
                 <!-- Main content -->
                   <section class="invoice">
                      <div class="row">
                          <div class="col-xs-8">


                                <?php
                                        try {
                                        $sql = " SELECT nombre, primer_apellido, segundo_apellido, dni, url_dni_1, url_dni_2, banco, ss, tlf, email, url_foto, editado, ultimo_email_ficha, url_banco from trabajadores ";
                                        $sql .= " WHERE id_trabajador = $id_trabajador ";

                                        $resultado = $conn->query($sql);
                                    } catch (Exception $e) {
                                        $error = $e->getMessage();
                                        echo $error;
                                    }
                                    while ($trabajador = $resultado->fetch_assoc()) { ?>

                                     <!-- Content Wrapper. Contains page content -->

                                    <h2 class="page-header">
                                    <i class="far fa-user icono_user"></i><br> 
                                    <strong>Nombre: </strong><?php echo $trabajador['nombre']; ?><br>
                                    <strong>1º Apellido: </strong><?php echo $trabajador['primer_apellido']; ?><br>
                                    <strong>2º Apellido: </strong><?php echo $trabajador['segundo_apellido']; ?>
                                    </h2>


                            </div><!--col-xs-8-->              
                        </div><!--row-->



                        <div class="row">
                            <div class="col-xs-12 table-responsive centrar-fotos">
                                <table class="table table-striped">
                                 
                                    <div> 
                                        <a data-lightbox="image-1" href="img/trabajadores/<?php echo $trabajador['url_foto']; ?>">
                                        <img class="imagen_1" src="img/trabajadores/<?php echo $trabajador['url_foto']; ?>" width="150px">
                                        </a>
                                    </div>
                                    <br>
                                        <?php
                                        if(isset($trabajador['banco'])){
                                        $banco = $trabajador['banco'];
                                        function hiddenString($str, $start = 1, $end = 1){
                                            $len = strlen($str);
                                            return substr($str, 0, $start) . str_repeat('*', $len - ($start + $end)) . substr($str, $len - $end, $end);
                                        }
                                        }
                                        ?>
                                    <tbody>
                                         <ul class="lista_trabajador">
                                                <li><strong>Email: </strong><?php echo $trabajador['email'] ;  ?></li>    
                                                <li><strong>DNI: </strong><?php echo $trabajador['dni'] ?></li>
                                                <?php if(isset($banco)) { ?>
                                                <li><strong>Banco: </strong><?php echo hiddenString($banco,0,5); ?></li>
                                                <?php } ?>
                                                <li><strong>Seguridad S: </strong><?php echo $trabajador['ss'] ?></li>
                                                <li><strong>Teléfono: </strong><?php echo $trabajador['tlf'] ?></li>
                                        </ul>
                                    </tbody>
                                </table>
                            </div><!--Table responsive -->


                            
                            <div class="col-md-6 table-responsive">
                                <p class="lead"><strong>Foto DNI</strong></p>
                                <div class="table-responsive centrar-fotos">
                                    <table class="table">
                                        <tr class="col-xs-6">
                                            <a data-lightbox="image-2" href="img/trabajadores/<?php echo $trabajador['url_dni_1']; ?>">
                                            <img src="img/trabajadores/<?php echo $trabajador['url_dni_1']; ?>" width="150px">
                                            </a>
                                        </tr>
                                        <tr class="col-xs-6">
                                            <a data-lightbox="image-3" href="img/trabajadores/<?php echo $trabajador['url_dni_2']; ?>">
                                            <img src="img/trabajadores/<?php echo $trabajador['url_dni_2']; ?>" width="150px">
                                            </a>
                                        </tr>
                                    </table>
                                </div>
                            </div><!-- table responsive -->


                            <div class="col-md-6 table-responsive">
                                <p class="lead"><strong>Foto Banco</strong></p>
                                    <div class="table-responsive centrar-fotos">
                                        <table class="table">
                                        <tr class="col-xs-6">
                                            <a data-lightbox="image-3" href="img/trabajadores/<?php echo $trabajador['url_banco']; ?>">
                                            <img src="img/trabajadores/<?php echo $trabajador['url_banco']; ?>" width="150px">
                                            </a>
                                        </tr>
                                        </table>
                                    </div>
                            </div><!-- table responsive -->
                    
                </div><!-- row -->
                

                <div class="row">
                    <div class="col-xs-8">
                        <div class="table-responsive">
                            <table>
                                <tr><?php 
                                    setlocale(LC_ALL,"es_ES");
                                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($trabajador['editado']));
                                ?>
                                    <td>Ultima actualización<br><small><?php echo $fecha_formateada; ?></small></td>
                                </tr><?php
                                    setlocale(LC_ALL,"es_ES");
                                    $fecha_formateada2 =  strftime("%A, %d %B %G", strtotime($trabajador['ultimo_email_ficha']));?>
                            </table>
                        </div>
                    </div>
                </div><!-- row -->  
                <br>
   
      <!-- botones de acción -->
     
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
                        </div><!-- col-xs-12 -->
                </div><!-- row no print -->
                <?php } ?>     

                </section>
                <br><br>

 
            <div class="row">
                <div class="col-md-11">
                    <div class="box lista_asignaciones">
                        <div Class="h1_asignacion">
                            <h1>Fiestas asignadas pendientes de trabajar</h1>
                        </div><br>
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
                                            $sql = " SELECT id_fiesta, nombre_evento, nombre_sala, fecha, hora_inicio, archivado, id_asignaciones, trabajador_id, fiesta_id, puesto_id, id_trabajador, nombre, primer_apellido, segundo_apellido, email_env, ultimo_email_asignaciones ";
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

                                          while ($asignaciones = $resultado->fetch_assoc()) { 
                                              $fiesta_id = $asignaciones['fiesta_id'];
                                              setlocale(LC_ALL,"es_ES");
                                              $fecha_email =  strftime("%A, %d %B %G", strtotime($asignaciones['ultimo_email_asignaciones']));
                                            
                                              if(($asignaciones['email_env']) == 0) {
                                                  $email_env = "No"; 
                                              } else {
                                                  $email_env = "Si";
                                              }
                                            ?>
                                    <tr>
                                    <td> <?php echo $asignaciones['nombre_evento'];  ?></td>
                                    <td><?php echo $asignaciones['nombre_sala'];  ?></td>
                                    <td><?php echo $asignaciones['fecha'];  ?></td>
                                    <td><?php echo $asignaciones['hora_inicio'] ; ?></td>
                                    <td><?php echo $email_env ; ?></td>
                                    </tr>
                                    <?php } ?>
                                </table>
                    
                
                
                                <br><br><br>
                <!-- acciones -->
                                <div class="col-xs-12">
                                    
                                    <?php
                                            if (!isset($fiesta_id)){
                                                echo "No hay fiestas asignadas";
                                            } else {?>
                                            <button id="" type="button" class="btn btn-info pull-right" style="margin-right: 5px;">
                                            <a href="mail-asignaciones.php?id=<?php echo $id_trabajador ?>"><i class="fa fa-download"></i> Enviar email</a>
                                            </button>

                                            <div>Ulimo email enviado "Fiestas"<br><small><?php echo $fecha_email; ?></small></div>

                                    <?php } ?>

                                </div><!-- col-cs-12-->
                                
                             </div><!--box body -->
                        </div><!-- lista asignaciones -->
                </div><!-- col-md-11-->

                <div class="col-md-11">
                    <div class="box lista_asignaciones">
                        <div Class="h1_asignacion">
                            <h1>Fiestas trabajadas</h1>
                        </div><br>


                        <!-- /.box-header -->
                         <div class="box-body no-padding">
                                <table class="table table-condensed tabla-asignacion">
                                        <tr>
                                        <th>Nombre Fiesta</th>
                                        <th>Sala</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Hora fichado</th>
                                        </tr>


                                                <?php 
                                                try {
                                                    $sql = " SELECT id_fiesta, nombre_evento, nombre_sala, fecha, hora_inicio, archivado, id_asignaciones, trabajador_id, fiesta_id, puesto_id, id_trabajador, nombre, primer_apellido, segundo_apellido, hora_fichado ";
                                                    $sql .= " FROM fiestas ";
                                                    $sql .= " INNER JOIN asignaciones ";
                                                    $sql .= " ON fiestas.id_fiesta=asignaciones.fiesta_id ";
                                                    $sql .= " INNER JOIN trabajadores ";
                                                    $sql .= " ON asignaciones.trabajador_id=trabajadores.id_trabajador ";
                                                    $sql .= " WHERE id_trabajador = $id_trabajador and archivado = 3 ";

                                                    $resultado = $conn->query($sql);
                                                } catch (Exception $e) {
                                                    $error = $e->getMessage();
                                                    echo $error;
                                                }

                                                while ($asignaciones = $resultado->fetch_assoc()) { 
                                                setlocale(LC_ALL,"es_ES");
                                                $fecha_formateada =  strftime("%H:%M", strtotime($datosFiestas['hora_fichado']));
                                                if (!isset($asignaciones['fiesta_id'])){
                                                    echo "no constan";
                                                } else { ?>
                                                    <tr>
                                                <td> <?php echo $asignaciones['nombre_evento'];  ?></td>
                                                <td><?php echo $asignaciones['nombre_sala'];  ?></td>
                                                <td><?php echo $asignaciones['fecha'];  ?></td>
                                                <td><?php echo $asignaciones['hora_inicio'] ; ?></td>
                                                <td class="hora-fichado"><?php echo $fecha_formateada ; ?></td>
                                                </tr>
                                                  <?php  }?>      
                                               
                                                <?php } ?>
                                </table>
                        </div><!-- box body -->
                    </div><!-- lista asignaciones -->
                </div><!-- col-md-11-->
    
        <div class="control-sidebar-bg"></div>
    </div>
</div>

<div id="editor"></div>


<?php include_once 'templates/footer.php'; 
endif;?>



