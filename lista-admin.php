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
                  <th class="acceso_trabajador">Trabajador</th>
                  <th class="centrar_usuario">Acceso Administrador</th>
                  <th class="centrar_acciones">Eliminar</th>
                </tr>
                </thead>
               <tbody>

                  <?php

                  try {
                    $sql = " SELECT id_admin, usuario, id_trabajador, nombre, primer_apellido, segundo_apellido, acceso_administrador ";
                    $sql .= " from admins ";
                    $sql .= " inner join trabajadores ";
                    $sql .= " on admins.trabajador_id=trabajadores.id_trabajador ";
                    $sql .= " WHERE id_admin > 1 ";
                    $sql .= " ORDER BY usuario ASC ";
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
                            <p class="code_activo"><code>Activo</code></p>
                            <p><?php echo $admin['nombre']. " " . $admin['primer_apellido'] . " " . $admin['segundo_apellido']; ?></p>
                        </td>
                        <td class="centrar_acciones">
                            <p id="acceso_administrador" name="acceso_administrador"> <code><?php echo $acceso_admin; ?></code></p>
                            <?php  if ($admin['acceso_administrador'] == 1) {
                                $acceso_admin = "Con acceso";?>
                                <a href="#" id="acceso-no" data-id="<?php echo $admin['id_admin']; ?>" usuario="<?php echo $admin['usuario']; ?>" data-tipo="admin-editar"  acceso="0" class="btn bg-red bnt-flat margin editar_admin">
                            <i>-</i>
                             <?php } else {
                               $acceso_admin = "Sin acceso";?>
                               <a href="#" id="acceso-ok" data-id="<?php echo $admin['id_admin']; ?>" usuario="<?php echo $admin['usuario']; ?>" data-tipo="admin-editar"  acceso="1" class="btn bg-green bnt-flat margin editar_admin">
                            <i>+</i>
                             <?php } ?>
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



