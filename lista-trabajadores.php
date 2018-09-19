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
        Listado de Trabajadores
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header titulo_h3">
              <h3 class="box-title">Busca a los trabajadores en esta seción</h3>
            </div>
            <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 100%;">
                  <input type="text" name="buscador-trabajadores" id="buscador-trabajadores" class="form-control pull-right" placeholder="Buscar">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr class="tabla_header">
                  <th class="centrar_usuario">Nombre</th>
                  <th class="trabajadores_obserb">Observaciones</th>
                  <th class="trabajadores_img">Imagen</th>
                  <th class="centrar_acciones">Acciones</th>
                </tr>
                </thead>
               <tbody>

                  <?php

                  try {
                    $sql = "SELECT id_trabajador, nombre, primer_apellido, url_foto, observaciones FROM trabajadores WHERE id_trabajador > '1'";
                    $resultado = $conn->query($sql);
                  }catch (Exception $e){
                    $error = $e->getMessage();
                    echo $error;
                  }
                  while($trabajadores = $resultado->fetch_assoc()){ ?>
                    <tr class="centrar_tabla">
                      <td class="trabajadores_nombre"><?php echo $trabajadores['nombre'] . " " . $trabajadores['primer_apellido']; ?></td>
                      <td class="trabajadores_obserb"><?php echo $trabajadores['observaciones']; ?></td>
                      <td class="trabajadores_img"><img src="img/trabajadores/<?php echo $trabajadores['url_foto']; ?>" width="150px"></td>
                      <td class="centrar_iconos">
                        <a href="ver-trabajador.php?id=<?php echo $trabajadores['id_trabajador'] ?>" class="btn bg-green btn-flat margin">
                        <i class="far fa-eye"></i>
                        <a href="#" data-id="<?php echo $trabajadores['id_trabajador']; ?>" data-tipo="trabajadores" class="btn bg-maroon bnt-flat margin borrar_registro">
                        <i class="fa fa-trash"></i>
                      </a>
                      </td>
                    </tr>
               <?php }; ?>

              


               </tbody>
                <tfoot>
                <tr class="tabla_header">
                <tr class="tabla_header">
                  <th class="centrar_usuario">Nombre</th>
                  <th class="trabajadores_obserb">Observaciones</th>
                  <th class="trabajadores_img">Imagen</th>
                  <th class="centrar_acciones">Acciones</th>
                </tr>
                </tfoot>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; ?>



