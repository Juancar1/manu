<?php

      include_once 'funciones/sesiones.php';
      include_once 'funciones/conexion.php';
      include_once 'funciones/consultas.php';
      include_once 'templates/header.php';
      include_once 'templates/barra.php';
      include_once 'templates/navegacion.php';
      if(($_SESSION['acceso_administrador']) == 1):?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="row">
      <div class="col-md-12">

    <!-- Main content -->
    <section>

            <div class="box collapsed-box">
            <div class="box-header">
              <h3 class="box-title">Notas
                <small></small>
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-plus"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">

            <form role="form" method="post" name="guardar-nota" id="guardar-nota" action="modelo-nota.php">
                <textarea name="texto" class="textarea" placeholder="Pon el texto aquí"
                          style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
            </div>  
          
          

            <div class="box-footer">
                        <input type="hidden" name="registro" value="nuevo">
                        <button type="submit" class="btn btn-primary" id="anadir_nota">Grabar</button>
                </div>
            </div>
            </form>

             <section class="content">


      <div class="row">
          <div class="col-md-12">
                       <?php $resultado = notas();
                         while($notas = $resultado->fetch_assoc()){ ?>
                    <div class="box">
                     <div class="post" id="<?php echo $notas['id_notas']; ?>">
                      <div class="user-block">
                         <span class="username">
                       <?php   setlocale(LC_ALL,"es_ES");
                          $fecha_formateada =  strftime("%A, %d %B %G", strtotime($notas['editado']));?>
                          <a href="#"></a>
                          <a href="#" data-id="<?php echo $notas['id_notas']; ?>" data-tipo="nota" class="pull-right btn-box-tool borrar_registro"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description text-center"><?php echo $fecha_formateada; ?></span>
                  </div>
                  <!-- /.user-block -->
                  <p class="nota-texto">
                  <?php echo $notas['text']; ?>
                  </p>
                
                <?php } ?>
              </div>
            <!-- /.box-body -->
           </div>
          <!-- /.box -->
          </div>
        <!-- /.col -->
       </div>
      <!-- /.row -->
     </section>
      </div><!-- bootstrap md-8 -->
    </div><!-- bootstrap box -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; 
endif;?>



