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
        Listado de Administradores
        <small></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header titulo_h3">
              <h3 class="box-title">Maneja los usuarios en esta seción</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr class="tabla_header">
                  <th class="centrar_usuario">Usuario</th>
                  <th class="acceso_trabajador">Acceso trabajador</th>
                  <th class="centrar_usuario">Acceso Administrador</th>
                  <th class="centrar_acciones">Eliminar</th>
                </tr>
                </thead>
               <tbody>

                  <?php

                  try {
                    $sql = "SELECT id_admin, usuario, acceso_administrador, password FROM admins WHERE id_admin > 1 ";
                    $resultado = $conn->query($sql);
                  } catch (Exception $e) {
                    $error = $e->getMessage();
                    echo $error;
                  }
                  while ($admin = $resultado->fetch_assoc()) {

                    if ($admin['acceso_administrador'] == 1) {
                      $acceso_admin = "Con acceso";
                    } else {
                      $acceso_admin = "Sin acceso";
                    }

                    ?>
                    <tr id="<?php echo $admin['id_admin'] ?>">
                        <td><?php echo $admin['usuario']; ?></td>
                        <td class="acceso_trabajador">
                            <div class="progress progress-sm active">
                            <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                              <span class="sr-only">20% Complete</span>
                            </div>
                            </div>
                            <p class="code_activo"><code>Activo</code></p>
                        </td>
                        <td class="centrar_acciones">
                            <input type="text" class="" id="acceso_administrador" name="acceso_administrador"  value="<?php echo $acceso_admin; ?>">
                            <a href="#" id="acceso-ok" data-id="<?php echo $admin['id_admin']; ?>" usuario="<?php echo $admin['usuario']; ?>" data-tipo="admin-editar"  acceso="1" class="btn bg-green bnt-flat margin editar_admin">
                            <i>+</i>
                            <a href="#" id="acceso-no" data-id="<?php echo $admin['id_admin']; ?>" usuario="<?php echo $admin['usuario']; ?>" data-tipo="admin-editar"  acceso="0" class="btn bg-red bnt-flat margin editar_admin">
                            <i>-</i>
                        </td>
                        <td class="centrar_acciones">
                            <a href="#" data-id="<?php echo $admin['id_admin']; ?>" data-tipo="admin" class="btn bg-maroon bnt-flat margin borrar_registro">
                            <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
               <?php 
            }; ?>


               </tbody>
                <tfoot>
                  <tr class="tabla_header">
                  <th class="centrar_usuario">Usuario</th>
                  <th class="acceso_trabajador">Acceso trabajador</th>
                  <th class="centrar_usuario">Acceso Administrador</th>
                  <th class="centrar_acciones">Eliminar</th>
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



