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
        Funcionalidades de la aplicación
        <small></small>
      </h1>
      
    </section>
   
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th style="width: 10px"></th>
                  <th>Descripción</th>
                  <th style="width: 40px"></th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Trabajador</td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td>1.1 Ver lista de trabajadores</td>
                  <td>
                  <a href="lista-trabajadores.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.1 Borrar trabajador</td>
                  <td>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.2 Ver ficha</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.3 Editar ficha</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.4 Imprimir ficha</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.5 PDF ficha</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.6 Email ficha "Mandar al trabajador"</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.7 Fiestas asignadas al trabajador</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.8 Email Fiestas asignadas al trabajador "Mandar al trabajador"</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">1.1.9 Fiestas trabajadas</td>
                </tr>
                <tr>
                  <td></td>
                  <td>1.2 Crear Trabajador</td>
                  <td>
                  <a href="crear-trabajadores.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Fiestas</td>
                </tr>
                <tr>
                  <td></td>
                  <td>2.1 Lista de fiestas con trabajadores asignados</td>
                  <td>
                  <a href="lista-asignacion.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">2.1.1 Asignar trabajadores a una fiesta</td>
                  <td>
                  <a href="lista-asignacion.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>2.2 Crear Fiesta</td>
                  <td>
                  <a href="crear-fiestas.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>2.3 Listado de Fiestas</td>
                  <td>
                  <a href="lista-fiestas.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">2.3.1 Borrar Fiesta</td>
                  <td>
                  <a href="lista-fiestas.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>2.4 Fichar trabajadores</td>
                  <td>
                  <a href="fiesta-fichar.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>2.5 Fiestas antiguas</td>
                  <td>
                  <a href="lista-fiestas-antiguas.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">2.5.1 Ficha fiesta antigua</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">2.5.2 PDF generar</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">2.5.3 Imprimir fiesta antigua</td>
                </tr>
                <tr>
                  <td>3.</td>
                  <td>Puestos</td>
                </tr>
                <tr>
                  <td></td>
                  <td>3.1 Crear Puesto</td>
                  <td>
                  <a href="crear-puesto.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td>4.</td>
                  <td>Administradores</td>
                </tr>
                <tr>
                  <td></td>
                  <td>4.1 Listado de Administradores</td>
                  <td>
                  <a href="lista-admin.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">4.1.1 Borrar Administrador</td>
                </tr>
                <tr>
                  <td></td>
                  <td class="segundo_rango">4.1.2 Dar acceso como administrador</td>
                </tr>
                <tr>
                  <td></td>
                  <td>4.2 Crear Administrador</td>
                  <td>
                  <a href="crear-admin.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td>5.</td>
                  <td>Notas</td>
                </tr>
                <tr>
                  <td></td>
                  <td>5.1 Crear Nota</td>
                  <td>
                  <a href="notas.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>5.2 Borrar Nota</td>
                  <td>
                  <a href="notas.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td>6.</td>
                  <td>Ajustes</td>
                  <td>
                  <a href="ajustes.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>6.1 Contraseña cambiar "Solo Password de Manu"</td>
                  <td>
                  <a href="editar-admin.php">Ir</a>
                  </td>
                </tr>
                <tr>
                  <td></td>
                  <td>6.2 Funcionalidades "Esta misma página"</td>
                </tr>
                <tr>
                  <td></td>
                  <td>6.3 Última versión</td>
                  <td>
                  <a href="ultimaversion.php">Ir</a>
                  </td>
                </tr>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    
             
       
    

       </section>
    <!-- /.content -->
      </div><!-- bootstrap md-8 -->
    </div><!-- bootstrap box -->
  </div>
 
  <!-- /.content-wrapper -->


<?php include_once 'templates/footer.php'; 
endif;?>
