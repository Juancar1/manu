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
        Cambiar contraseña
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
          <h3 class="box-title">Introduce tu nueva contraseña</h3>
        </div>

        <?php
              try {
                $sql = " SELECT id_admin, usuario, password, acceso_administrador ";
                $sql .= " FROM admins ";
                $sql .= " WHERE id_admin = 1 ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }

              while ($admin = $resultado->fetch_assoc()) { ?>
                 

        <!-- /.box-body -->
       
        <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="modelo-admin-editar.php">
              <div class="box-body">
                      <div class="form-group">
                          <label for="nombre">Usuario: </label>
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Usuario" value="<?php echo $admin['usuario'] ?>"readonly>
                      </div>
                      <div class="form-group">
                          <label for="password">Password: </label>
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      </div>
                      <div class="form-group">
                          <label for="password">Repetir Password: </label>
                          <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Password">
                          <span id="resultado_password" class="help-block"></span>
                      </div>
              </div>

         <!-- /.box-body -->

              <div class="box-footer">
                        <input type="hidden" name="contraseña" value="modificar">
                        <button type="submit" class="btn btn-primary" id="">Grabar</button>
                  </div>
          </form>
          </div>
    
              <?php } ?>
       </section>
    <!-- /.content -->
      </div><!-- bootstrap md-8 -->
    </div><!-- bootstrap box -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; 
endif;?>



