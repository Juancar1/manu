<?php
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
if(($_SESSION['acceso_administrador']) == 1):?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


    <div class="row">
      <div class="col-md-8">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Versión 1.0</h3>
        </div>
           <p class="texto_versiones">Aquí se irán publicando las nuevas actualizaciones y funciones nuevas</p>
        <div>

        </div>

             
          </div>
    

       </section>
    <!-- /.content -->
      </div><!-- bootstrap md-8 -->
    </div><!-- bootstrap box -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; 
endif;?>
