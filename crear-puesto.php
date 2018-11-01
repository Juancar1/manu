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
        Crear un puesto
        <small></small>
      </h1>
      
    </section>

    <div class="row">
      <div class="col-md-8">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Rellena la casilla para crear un nuevo puesto</h3>
        </div>
       
        <!-- /.box-body -->
       
        <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo-puesto.php">
              <div class="box-body">
                      <div class="form-group">
                          <label for="nombre_puesto">Nombre del puesto: </label>
                          <input type="text" class="form-control" id="nombre_puesto" name="nombre_puesto" placeholder="Nombre del puesto" minlength="2" maxlength="20" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{20}" required/>
                      </div>
              </div>

         <!-- /.box-body -->

              <div class="box-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-primary" id="crear_puesto">Añadir</button>
              </div>
            </form>

               <div class="box-header">
              <h3 class="box-title">Lista de puestos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th>Puesto</th>
                  <th>Activo</th>
                  <th>Eliminar</th>
                </tr>
                <tbody>
                <?php
                  try {
                    $sql = "SELECT id_puestos, nombre_puesto FROM puestos";
                    $resultado = $conn->query($sql);
                  }catch (Exception $e){
                    $error = $e->getMessage();
                    echo $error;
                  }
                  while($puestos = $resultado->fetch_assoc()){ ?>

                    <tr>
                      
                      <td><?php echo $puestos['nombre_puesto'] ?></td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div>
                      </td>
                      <td class="centrar_acciones">
                      <a href="#" data-id="<?php echo $puestos['id_puestos']; ?>" data-tipo="puesto" class="btn bg-maroon bnt-flat margin borrar_registro">
                        <i class="fa fa-trash"></i>
                      </td>
                    </tr>
                    <?php }; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
         
    </div>
    

       </section>
    <!-- /.content -->
      </div><!-- bootstrap md-8 -->
    </div><!-- bootstrap box -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; 
endif;?>



