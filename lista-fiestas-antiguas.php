<?php

      include_once 'funciones/sesiones.php';
      include_once 'funciones/conexion.php';
      include_once 'templates/header.php';
      include_once 'templates/barra.php';
      include_once 'templates/navegacion.php';
      if(($_SESSION['acceso_administrador']) == 1):?>

 $sql = " SET GLOBAL group_concat_max_len=10500 ";
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Fiestas antiguas
        <small></small>
      </h1>
      
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Aquí tienes las fiestas que ya han pasado</h3>
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
                $sql .= " WHERE archivado = 3 ";
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
                  <td><p class="lista_trabajadores">Trabajadores totales <?php echo $asignaciones['count(id_trabajador)'] ?></p> 
                  <?php echo $lista_trabajadores. "<br>"; ?>
                </td>
                  <td class="centrar_acciones">
                  <a href="ver-fiestas.php?id=<?php echo $asignaciones['id_fiesta'] ?>" class="btn bg-green btn-flat margin">
                     <i class="far fa-eye"></i>
                  </a>
                  </td>
                </tr>

                  <?php }; ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
                

          
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



