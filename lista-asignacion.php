<?php

      include_once 'funciones/sesiones.php';
      include_once 'funciones/conexion.php';
      include_once 'templates/header.php';
      include_once 'templates/barra.php';
      include_once 'templates/navegacion.php';
      if(($_SESSION['acceso_administrador']) == 1):?>



  <div class="content-wrapper">


    <!-- Main content -->
    <section class="">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Agrega y elimina trabajadores a las fiestas</h3>
            </div>

              
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fiesta</th>
                  <th>Información</th>
                  <th class="centrar_acciones">Acciones</th>
                </tr>
                </thead>
               <tbody>
                 


            <?php
            try{
                $sql = " SELECT id_fiesta, nombre_evento, hora_inicio, fiesta_id, fecha, DATE_FORMAT(fecha, '%M %D, %Y' ), count(id_trabajador), GROUP_CONCAT(nombre) ";
                $sql .= " FROM fiestas ";
                $sql .= " INNER JOIN asignaciones ";
                $sql .= " ON fiestas.id_fiesta=asignaciones.fiesta_id ";
                $sql .= " INNER JOIN trabajadores ";
                $sql .= " ON asignaciones.trabajador_id=trabajadores.id_trabajador ";
                $sql .= " WHERE archivado = 0 ";
                $sql .= " GROUP BY id_fiesta ";
                $sql .= " ORDER BY fecha, hora_inicio ASC ";

                $resultado = $conn->query($sql);
            }catch (Exception $e){
                $error = $e->getMessage();
                echo $error;
              }
              while($asignaciones = $resultado->fetch_assoc()){
                    setlocale(LC_ALL,"es_ES"); 
                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($asignaciones['fecha']));
                    $lista_trabajadores = $asignaciones["GROUP_CONCAT(nombre)"];
                    $lista_trabajadores = str_replace ( ',' , '<br>' , $lista_trabajadores );?>
                <tr>
                  <td id="<?php echo $asignaciones['id_fiesta'] ?>"><p class="datos_fiesta"><?php echo $asignaciones['nombre_evento'] . "<br> " . $fecha_formateada . "<br>" . " " . $asignaciones['hora_inicio'] ?></p>
                  <input type="hidden" id="fecha" value="<?php echo $asignaciones['fecha']; ?>"><br>
                  <input type="hidden" value="<?php echo $asignaciones['hora_inicio'] ?>" class="reloj" id="hora">
                </td>
                  <td><p class="lista_trabajadores">Trabajadores totales <?php echo $asignaciones['count(id_trabajador)'] ?></p> 
                  <?php echo $lista_trabajadores. "<br>"; ?>
                </td>
                  <td class="centrar_acciones">
                  <a href="ver-fiestas-fichar.php?id=<?php echo $asignaciones['id_fiesta'] ?>" class="btn bg-green btn-flat margin">
                     <i class="far fa-eye"></i>
                  </a>
                  <a href="editar-asignacion.php?id=<?php echo $asignaciones['id_fiesta'] ?>" class="btn bg-orange btn-flat margin">
                  <i class="far fa-plus-square"></i>
                  </a>
                  <a href="eliminar-asignacion.php?id=<?php echo $asignaciones['id_fiesta'] ?>" class="btn bg-red btn-flat margin">
                  <i class="fas fa-minus"></i>
                  </a>
                  </td>
                </tr>

                  <?php }; ?>

                  
         
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
                

          <div class="asignar_trabajador_3select">
          <div class="row">
             <div class="col-md-4">
                   <label class="fiesta_label">Fiesta: </label>
                          <select id='fiesta_select' class="form-control fiesta">
                              <option value="0" >- Selecciona -</option>
                                    <?php  
                                    try{
                                        $sql = "SELECT * FROM fiestas WHERE archivado = 0 ";
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



          </div><!-- clol-md-12-->     
          </div><!-- class row -->
          <br><br><br><br><br>
         <a href="index.php"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include_once 'templates/footer.php'; 
endif;?>



