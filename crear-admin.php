<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
if(($_SESSION['acceso_administrador']) == 1):?>

?>



  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear administrador
        <small>El nombre de usuario tiene que ser único</small>
      </h1>
      
    </section>

    <div class="row">
      <div class="col-md-8">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Rellena el formulario para dar de alta a un nuevo administrador</h3>
        </div>
       
        <!-- /.box-body -->
       
        <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo-admin.php">
              <div class="box-body">
                      <div class="form-group">
                          <label for="nombre">Usuario: </label>
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Usuario">
                      </div>
                      <div class="form-group">
                          <label for="password">Password: </label>
                          <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
              </div>

         <!-- /.box-body -->

              <div class="box-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-primary" id="crear_registro_admin">Añadir</button>
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



