<?php
          include_once 'funciones/sesiones.php';
          include_once 'funciones/conexion.php';
          include_once 'templates/header.php';
          include_once 'templates/barra.php';
          include_once 'templates/navegacion.php';
          
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Página principal
        <small>it all starts here</small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ajustes</h3>
        </div>
            <a href="editar-admin.php">Cambiar contraseña</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; ?>



