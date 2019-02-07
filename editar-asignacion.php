<?php

$id_fiesta = $_GET['id'];
if (!filter_var($id_fiesta, FILTER_VALIDATE_INT)) {
  die("Error");
}
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
if(($_SESSION['acceso_administrador']) == 1):?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <form role="form" method="post" name="guardar-registro" id="guardar-registro" action="">
     
    <!-- Main content -->
    <section class="">
      <!-- Default box -->
      <div class="box">
      <!-- centro -->
      <div class="row">
       <div class="col-xs-12">
            <div class="box">

              <?php
              try {
                $sql = " SELECT id_fiesta, nombre_evento, fecha, hora_inicio, observaciones ";
                $sql .= " FROM fiestas ";
                $sql .= " WHERE id_fiesta = $id_fiesta ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }

              while ($fiestas = $resultado->fetch_assoc()) { 
                
                    setlocale(LC_ALL,"es_ES");
                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($fiestas['fecha']));?>

                <div class="box-header">
                        <h3 class="box-title">
                
                    <tr>
                        <td><?php echo $fiestas['nombre_evento']; ?></td><br>
                        <td>Fecha <?php echo $fecha_formateada; ?></td><br>
                        <td>Hora de inicio: <?php echo $fiestas['hora_inicio']; ?></td><br>
                    </tr>
                        </h3>
                <?php 
              } ?>
                  </div>

              <div class="box-tools">
               
                
                <div class="form-group">
                          <label>Puesto: </label>
                          <select id='puesto' class="form-control">
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
                      <br>

                      <div class="input-group input-group-sm" style="width: 100%;">
                        <input type="text" name="buscador" id="buscador" class="form-control pull-right" placeholder="Buscar">

                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
              </div>
              <br>

           
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Nombre</th>
                  <th>DNI</th>
                  <th>Foto</th>
                  <th>Agregar</th>
                </tr>
              <?php
              
              try {
                  $sql = 'SELECT * from trabajadores ';
                  $sql .= ' WHERE id_trabajador > 1 ';

                  $resultado = $conn->query($sql);
              } catch (Exception $e) {
                  $error = $e->getMessage();
              } ?><tbody><?php
               while ($trabajadores = $resultado->fetch_assoc()) {?>

                <tr id="<?php $trabajadores['id_trabajador'] ?>">
                  <td><p><?php echo $trabajadores['nombre'] . " " . $trabajadores['primer_apellido']; ?> 
                  </td>
                  <td><p><?php echo $trabajadores['dni']; ?></p></td>
                  <td><img src="img/trabajadores/<?php echo $trabajadores['url_foto']; ?>" width="150px"></td>
                  <td>
                   <a href="#" id-trabajador="<?php echo $trabajadores['id_trabajador']; ?>" name="asignaciones" id-fiesta="<?php echo $_GET['id']; ?>" 
                    nombre-trabajador="<?php echo $trabajadores['nombre'] . " " . $trabajadores['primer_apellido']; ?>"  class="btn bg-green bnt-flat margin asignar_trabajador">
                    <i class="far fa-plus-square"></i>
                  </td>
                  
                </tr>
                <?php } ?> 
                </tbody>
              </table>
            </div>
            
          </div><!-- /.box-body -->
         
        </div><!-- col-xs-12-->
      </div><!-- row-->
      <a href="lista-asignacion.php"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
    </div> <!-- box -->
     </section>
     
     </form>
   
      </div><!--content-wrapper-->
            
<?php include_once 'templates/footer.php'; 
endif;?>



