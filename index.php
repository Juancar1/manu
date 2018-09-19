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
          <h3 class="box-title">Asignaciones</h3>
        </div>
        <div class="asignar_trabajador_3select">
          <div class="row">
             <div class="col-md-4">
                   <label class="fiesta_label">Fiesta: </label>
                          <select id='fiesta_select' class="form-control fiesta">
                              <option value="0" >- Selecciona -</option>
                                    <?php  
                                    try{
                                        $sql = "SELECT * FROM fiestas WHERE archivado = 0";
                                        $resultado = $conn->query($sql);
                                        while($fiestas = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $fiestas['id_fiesta'] ?>">
                                        <?php echo $fiestas['nombre_evento'] . " / " . $fiestas['nombre_sala'] ?></option>
                                        
                                        <?php } 

                                    } catch (Exception $e){
                                        echo "Error: " . $e->getMessage();
                                    }
                                    ?>
                          </select>
            </div><!-- clol-sx-12-->



             <div class="col-md-4">
                   <label class="trabajador_label">Trabajador: </label>
                          <select id='trabajador_select' class="form-control trabajador">
                              <option value="0" >- Selecciona -</option>
                                    <?php  
                                    try{
                                        $sql = "SELECT * FROM trabajadores ";
                                        $resultado = $conn->query($sql);
                                        while($trabajadores = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $trabajadores['id_trabajador'] ?>">
                                        <?php echo $trabajadores['nombre'] . " " . $trabajadores['primer_apellido'] . " " . $trabajadores['segundo_apellido'];   ?></option>
                                        
                                        <?php } 

                                    } catch (Exception $e){
                                        echo "Error: " . $e->getMessage();
                                    }
                                    ?>
                           </select>  
                                  </div>


          <div class="col-md-4">
                   <label class="puesto_label">Puesto: </label>
                          <select id='puesto_select' class="form-control puesto">
                              <option value="0" >- Selecciona -</option>
                                    <?php  
                                    try{
                                        $sql = "SELECT * FROM puestos ";
                                        $resultado = $conn->query($sql);
                                        while($puestos = $resultado->fetch_assoc()) { ?>
                                            <option value="<?php echo $puestos['id_puestos'] ?>">
                                        <?php echo $puestos['nombre_puesto'] ?></option>
                                        
                                        <?php } 

                                    } catch (Exception $e){
                                        echo "Error: " . $e->getMessage();
                                    }
                                    ?>
                          </select>

                          
                 </div><!-- clol-md-4-->
              <br>
            <br>

              
              <div class="col-md-4">
              <a href="#" id="asignar_trabajador_select" class="btn bg-green asignar_trabajador_select">Incluir</a>
              </div>

            
            </div>

           </div><!--class asignar trabajador -->


          <div class="box-header with-border">
          <h3 class="box-title">Asignaciones</h3>
          </div>

        
        


        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; ?>



