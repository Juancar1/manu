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
       
       
              <div class="box-body">
                      <div class="form-group">
                          <label for="nombre">Usuario: </label>
                          <input type="text" class="form-control" id="nombre_admin" name="" placeholder="Usuario" required>
                      </div>
                      <div class="form-group">
                          <label for="password">Password: </label>
                          <input type="text" class="form-control" id="password_admin" name="" placeholder="Password" required>
                      </div><br>

                      
                      <div>
                      <label>Selecciona al trabajador</label>
                      <select id='trabajador_select_usuario' class="form-control fiesta">
                              <option value="0" >- Selecciona -</option>
                                    <?php  
                                    try{
                                        $sql = "SELECT * FROM trabajadores ORDER BY nombre ASC ";
                                        $resultado = $conn->query($sql);
                                        while($trabajador = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $trabajador['id_trabajador'] ?>">
                                        <?php echo $trabajador['nombre'] . "   " . $trabajador['primer_apellido'] . " " . $trabajador['segundo_apellido']?></option>
                                        
                                        <?php } 

                                    } catch (Exception $e){
                                        echo "Error: " . $e->getMessage();
                                    }
                                    ?>
                                   
                          </select>
                        </div> <br>
              </div>

         <!-- /.box-body -->

              <div class="box-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-primary" id="crear_registro_admin">Añadir</button>
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



