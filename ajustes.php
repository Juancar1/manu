<?php
          include_once 'funciones/sesiones.php';
          include_once 'funciones/conexion.php';
          include_once 'templates/header.php';
          include_once 'templates/barra.php';
          include_once 'templates/navegacion.php';
          if(($_SESSION['acceso_administrador']) == 1):?>
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ajustes
        <small></small>
      </h1>
      
    </section>
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        <a href="editar-admin.php">Cambiar contraseña</a>
        </div>
        <div class="box-header with-border">
        <a href="#">Última versión</a>
        </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php';
endif;?>



