<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
if(($_SESSION['acceso_administrador']) == 1):?>


  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-8">

    <!-- Main content -->
    <section class="">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Rellena el formulario para crear una fiesta</h3>
        </div>
       
        <!-- /.box-body -->
       
        <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo-fiestas.php">
              <div class="box-body">
                      <div class="form-group">
                          <label for="nombre">Nombre Fiesta: </label>
                          <input type="text" class="form-control" id="nombre_fiesta" name="nombre_fiesta" placeholder="Nombre de la fiesta" require maxlength="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{4,50}" required/>
                      </div>
                      <div class="form-group">
                          <label for="nombre">Sala: </label>
                          <input type="text" class="form-control" id="nombre_sala" name="nombre_sala" placeholder="Nombre de la sala" maxlength="50" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{4,50}" required/>
                      </div>
                      <br>
                      <div class="form-group">
                        <label>Fecha:</label>
                        <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control" id="fecha" class="fecha" name="fecha_evento" step="1" value="" required>
                        </div>
                      </div>
                        <div class="bootstrap-timepicker">
                        <div class="form-group">
                        <label>Hora de comienzo:</label>
                        <div class="input-group">
                            <input type="time" lass="form-control" name="hora_evento" value="00:00" max="23:59" min="00:00" step="1" required>
                        <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        </div>
                     
                      <div class="form-group">Observaciones
                      <textarea name="texto" class="textarea" placeholder="Pon el texto aquí"
                          style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>
              </div>

         <!-- /.box-body -->

              <div class="box-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-primary" id="crear_registro">Añadir</button>
              </div>
            </form>
          </div>
    

       </section>
    <!-- /.content -->
      </div><!-- bootstrap md-8 -->
    </div><!-- bootstrap box -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; 
endif;?>
