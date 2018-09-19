<?php


          include_once 'funciones/sesiones.php';
          include_once 'templates/header.php';
          include_once 'funciones/conexion.php';
          include_once 'templates/barra.php';
          include_once 'templates/navegacion.php';

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Listado de Fiestas creadas
        <small>Por seguridad, las fiestas que tienen asignados trabajadores, no se podrán eliminar </small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header titulo_h3">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr class="tabla_header">
                  <th class="centrar_usuario">Nombre Fiesta</th>
                  <th class="nombre_sala">Nombre Sala</th>
                  <th class="fiestas_observaciones">Observaciones</th>
                  <th class="centrar_acciones">Fecha/Hora</th>
                  <th class="centrar_acciones">Borrar</th>
                </tr>
                </thead>
               <tbody>

                  <?php

                  try {
                    $sql = "SELECT id_fiesta, nombre_evento, nombre_sala, archivado, fecha, hora_inicio, observaciones, editado FROM fiestas ";
                    $sql .= " WHERE archivado = 0 ";
                    $sql .= " ORDER BY fecha, hora_inicio ASC ";
                    $resultado = $conn->query($sql);
                  }catch (Exception $e){
                    $error = $e->getMessage();
                    echo $error;
                  }
                    
                  while($fiestas = $resultado->fetch_assoc()){
                    setlocale(LC_ALL,"es_ES");
                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($fiestas['fecha']));
                    ?>
                    <tr class="centrar_tabla">
                      <td><?php echo $fiestas['nombre_evento']; ?></td>
                      <td class="nombre_sala"><?php echo $fiestas['nombre_sala']; ?></td>
                      <td class="fiestas_observaciones"><?php echo $fiestas['observaciones']; ?></td>
                      <td><?php echo $fecha_formateada . "<br> " . $fiestas['hora_inicio'] ?></td>
                      <td class="centrar_iconos">
                        <a href="#" data-id="<?php echo $fiestas['id_fiesta']; ?>" data-tipo="fiestas" class="btn bg-maroon bnt-flat margin borrar_registro">
                        <i class="fa fa-trash"></i>
                      </a>
                      </td>
                    </tr>
               <?php }; ?>

               </tbody>
                <tfoot>
                <tr class="tabla_header">
                <tr class="tabla_header">
                <tr class="tabla_header">
                  <th class="centrar_usuario">Nombre Fiesta</th>
                  <th class="nombre_sala">Nombre Sala</th>
                  <th class="fiestas_observaciones">Observaciones</th>
                  <th class="centrar_acciones">Fecha/Hora</th>
                  <th class="centrar_acciones">Borrar</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
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


<?php include_once 'templates/footer.php'; ?>



