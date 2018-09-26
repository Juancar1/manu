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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear una nota
        <small></small>
      </h1>
      
    </section>

    <div class="row">
      <div class="col-md-12">

    <!-- Main content -->
    <section class="content">

            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Notas
                <small></small>
              </h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
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
          <div class="box">
            <div class="box-header titulo_h3">
              <h3 class="box-title">Aquí tienes todas las notas registradas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr class="tabla_header">
                  <th class="centrar_usuario">Nota</th>
                  <th class="centrar_fecha">Fecha</th>
                  <th class="centrar_acciones">Eliminar</th>
                </tr>
                </thead>
               <tbody>

                  <?php

                  try {
                    $sql = "SELECT id_notas, text, editado FROM notas";
                    $resultado = $conn->query($sql);
                  }catch (Exception $e){
                    $error = $e->getMessage();
                    echo $error;
                  }
                  while($notas = $resultado->fetch_assoc()){ 
                    setlocale(LC_ALL,"es_ES");
                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($notas['editado']));?>
                    <tr class="centrar_tabla">
                      <td><?php echo $notas['text']; ?></td>
                      <td><?php echo $fecha_formateada; ?></td>
                      <td class="centrar_iconos">
                        <a href="#" data-id="<?php echo $notas['id_notas']; ?>" data-tipo="nota" class="btn bg-maroon bnt-flat margin borrar_registro">
                        <i class="fa fa-trash"></i>
                      </a>
                      </td>
                    </tr>
               <?php }; ?>
               </tbody> 
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


       </section>
    <!-- /.content -->
      </div><!-- bootstrap md-8 -->
    </div><!-- bootstrap box -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; 
endif;?>



