<?php
$id_trabajador = $_GET['id'];

if (!filter_var($id_trabajador, FILTER_VALIDATE_INT)) {
  die("Error");
}
        include_once 'funciones/sesiones.php';
        include_once 'funciones/consultas.php';
        include_once 'funciones/funciones.php';
        include_once 'funciones/conexion.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
        if(($_SESSION['acceso_administrador']) == 1):?>

    
          <div id="content">
             <div class="content-wrapper">
                 <!-- Main content -->
                   <section class="invoice">

 <section class="content">
  <div class="row">
    <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
    <?php 
        $trabajadores = trabajador($id_trabajador);
        if($trabajadores->num_rows){ 
        foreach($trabajadores as $trabajador) {?>

      <div class="box-body box-profile">
      <a data-lightbox="image-1" href="img/trabajadores/<?php echo $trabajador['url_foto']; ?>">
      <img class="imagen_1 foto" src="img/trabajadores/<?php echo $trabajador['url_foto']; ?>" width="150px"></a>

        <h3 class="profile-username text-center"><?php echo $trabajador['nombre'] . " " . $trabajador['primer_apellido']; ?></h3>

        <p class="text-muted text-center">Empleado</p>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
   
    <!-- About Me Box -->
    <div class="box box-primary">
      <!-- /.box-header -->
      <div class="box-body">
        <input type="hidden" id="datos_pendiente" value="<?php datos_pendiente($id_trabajador);?>"></input>

        <div class="center-block" id="mensaje_usuario"></div>

        <p class="text-danger"><?php datos_pendiente($id_trabajador);?></p>
        <hr><?php $resultado = asignacion_numero($id_trabajador);
        $fiestas_pendientes = $resultado->fetch_assoc(); ?>

        <strong><i class="fas fa-plus"></i> Fiestas pendientes <span class="label label-warning"><?php echo $fiestas_pendientes['count(*)'];?></strong></span> 
       <?php
        $resultado_texto = asignacion($id_trabajador);
        while ($asignaciones_texto = $resultado_texto->fetch_assoc()) { ?>
        <ul>
          <li>
            <p class="text-muted"><?php echo $asignaciones_texto['nombre_evento'] ?></p>
          </li>
        </ul>
      <?php  }?>

        <hr>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Datos</a></li>
        <li><a href="#timeline" data-toggle="tab">Fiestas Asignadas</a></li>
        <li><a href="#settings" data-toggle="tab">Fiestas trabajadas</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <div class="post">
            <div class="user-block">
            <div class="box box-primary">
            <div class="box-body box-profile">

             
              
              <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                  <b>Nombre</b> <a class="pull-right"><?php echo $trabajador['nombre'];  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Primer Apellido</b> <a class="pull-right"><?php echo $trabajador['primer_apellido'];  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Segundo apellido</b> <a class="pull-right"><?php echo $trabajador['segundo_apellido'];  ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email</b> <a class="pull-right"><?php echo $trabajador['email'];  ?></a>
                </li>
                <li class="list-group-item">
                  <b>DNI</b> <a class="pull-right"><?php echo $trabajador['dni'];  ?></a>
                </li>
                <li class="list-group-item">
                <?php
                                        if(isset($trabajador['banco'])){
                                        $banco = $trabajador['banco'];
                                       
                                        }
                                        ?>
                  <b>Banco</b><?php if(isset($banco)) { ?> <a class="pull-right"><?php echo hiddenString($banco,0,5); ?></a>
                </li>
                  <?php } ?>
                <li class="list-group-item">
                  <b>Seguridad S.</b> <a class="pull-right"><?php echo $trabajador['ss'] ?></a>
                </li>
                <li class="list-group-item">
                  <b>Tlf</b> <a class="pull-right"><?php echo $trabajador['tlf'] ?></a>
                </li>
              </ul>

             
            </div>
            <!-- /.box-body -->
          </div>
            </div>
          </div>
          <!-- /.post -->
          <?php  } } ?>
        

          <!-- Post -->
          <div class="post">
            <div class="user-block text-center">
              <span class="description">Imágenes</span>
            </div>
            <!-- /.user-block -->
            <div class="row margin-bottom">
             
              <!-- /.col -->
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-4">
                  <a data-lightbox="image-2" href="img/trabajadores/<?php echo $trabajador['url_dni_1']; ?>">
                  <img class="img-responsive foto" src="img/trabajadores/<?php echo $trabajador['url_dni_1']; ?>" width="150px">
                  </a>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                  <a data-lightbox="image-3" href="img/trabajadores/<?php echo $trabajador['url_dni_2']; ?>">
                  <img class="img-responsive foto" src="img/trabajadores/<?php echo $trabajador['url_dni_2']; ?>" width="150px">
                  </a>
                  </div>
                  <div class="col-sm-4">
                  <a data-lightbox="image-3" href="img/trabajadores/<?php echo $trabajador['url_banco']; ?>">
                  <img class="img-responsive foto" src="img/trabajadores/<?php echo $trabajador['url_banco']; ?>" width="150px">
                  </a>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              
              <!-- /.col -->
            </div>
            <p><strong>Observaciones</strong></p>
            <p><?php echo $trabajador['observaciones'];  ?>
            <!-- /.row -->
            <br>
            
            <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                 <?php setlocale(LC_ALL,"es_ES");
                 $fecha_formateada_ficha =  strftime("%A, %d %B %G", strtotime($trabajador['editado']));?>
                  <b>Actuali.</b> <p class="pull-right"><?php echo $fecha_formateada_ficha;  ?></p>
                </li>
            </ul>
            <br>
             <a href="editar-trabajador.php?id=<?php echo $id_trabajador ?>" class="btn btn-primary btn-block"><i class="far fa-edit"></i><b> Modificar Datos</b></a>
          </div><br><br>
          <ul class="list-inline text-center">
              <li><a href="mail-ficha.php?id=<?php echo $id_trabajador ?>" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Enviar Email</a></li>
              <li><a href="ver-trabajador-print.php?id=<?php echo $id_trabajador ?>" id="imprimir" target="_blank" class="link-black text-sm"><i class="fa fa-print"></i> Imprimir</a>
              <li><a href="#" id="cmd" class="link-black text-sm"><i class="fa fa-download"></i> Generar PDF</a>
              </li>
            </ul>
          <!-- /.post -->
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
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
                                            $resultado = asignacion($id_trabajador);
                                            while ($asignaciones = $resultado->fetch_assoc()) { 
    
                                              $fiesta_id = $asignaciones['fiesta_id'];
                                              setlocale(LC_ALL,"es_ES");
                                              $fecha_email =  strftime("%A, %d %B %G", strtotime($asignaciones['ultimo_email_asignaciones']));
                                              if($fecha_email == " "){
                                                $fecha_email =  "No se ha enviado ningún email";
                                              } else {
                                                $fecha_email = $fecha_email;}
                                            
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
                                            <button id="<?php echo $id_trabajador  ?>" type="button" class="btn btn-info pull-right" style="margin-right: 5px;">
                                            <a href="mail-asignaciones.php?id=<?php echo $id_trabajador ?>"><i class="fa fa-download"></i> Enviar email</a>
                                            </button>
                                            <div>Ulimo email enviado <br><small><?php echo $fecha_email; ?></small></div>
                                            <?php } ?>
                                            
                                   

                                </div><!-- col-cs-12-->
                                
                             </div><!--box body -->
                        </div><!-- lista asignaciones -->
                </div><!-- col-md-11-->

              
    
        <div class="control-sidebar-bg"></div>
    </div>
         
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
        <div class="row">
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
                                                $resultado = trabajadas($id_trabajador);
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
        </div>
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

</section>


      <!-- botones atras -->
                <div class="row no-print text-center">
                        <div class="col-xs-12">
                                <a href="lista-trabajadores.php"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
                        </div><!-- col-xs-12 -->
                </div><!-- row no print -->
               

                </section>
       
</div>

<div id="editor"></div>


<?php include_once 'templates/footer.php'; 
endif;?>



