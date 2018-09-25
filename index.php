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
        <small></small>
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
             </div>
             
             
            <!-- indicadores  -->                            
            <div class="row">
        <div class="col-lg-3 col-xs-6">
              <?php 
              $sql = "SELECT COUNT(id_trabajador) AS trabajadores FROM trabajadores ";
              $resultado = $conn->query($sql);
              $registrados = $resultado->fetch_assoc();
              ?>
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $registrados['trabajadores']; ?></h3>
              <p>Trabajadores</p>
            </div>
            <div class="icon">
            <i class="fas fa-users"></i>
            </div>
            <a href="lista-trabajadores.php" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <?php 
              $sql = "SELECT COUNT(id_fiesta) AS fiestas FROM fiestas WHERE archivado = 0";
              $resultado = $conn->query($sql);
              $fiestas = $resultado->fetch_assoc();
              ?>                        
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $fiestas['fiestas'];  ?><sup style="font-size: 20px"></sup></h3>

              <p>Fiestas creadas</p>
            </div>
            <div class="icon">
            <i class="fas fa-calendar-check"></i>
            </div>
            <a href="lista-fiestas.php" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <?php 
              $sql = "SELECT COUNT(id_admin) AS admins FROM admins ";
              $resultado = $conn->query($sql);
              $admins = $resultado->fetch_assoc();
              ?>          
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $admins['admins']; ?></h3>

              <p>Administradores</p>
            </div>
            <div class="icon">
            <i class="fas fa-unlock"></i>
            </div>
            <a href="lista-admin.php" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        <?php 
              $sql = "SELECT COUNT(id_puestos) AS puestos FROM puestos ";
              $resultado = $conn->query($sql);
              $puestos = $resultado->fetch_assoc();
              ?>       
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $puestos['puestos']; ?></h3>

              <p>Puestos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="crear-puesto.php" class="small-box-footer">Más info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
         

        
        


        
        <!-- /.box-footer-->
      
      <!-- /.box -->

    </section>

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; ?>



