<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
if(($_SESSION['acceso_administrador']) == 1):?>




  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="row">
      <div class="col-md-8">

    <!-- Main content -->
    <section class="">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Introduce tu nueva contraseña</h3>
        </div>

        <!-- /.box-body -->
       
        <form role="form" method="post" name="modificar-contrasena" id="modificar-contrasena" action="modelo-admin-editar.php">
          <legend></legend>
              <div class="box-body">
                      <div class="form-group">
                          <label for="password">Password: </label>
                          <input type="password" class="form-control" id="password" name="password" minlength="8" maxlength="40" placeholder="Password" >
                      </div>
              </div>

         <!-- /.box-body -->

              <div class="box-footer">
                        <input type="hidden" name="password" value="nuevo">
                        <button type="submit" class="btn btn-primary modificar-contrasena" >Enviar</button>
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



