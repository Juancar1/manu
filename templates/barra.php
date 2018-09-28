<?php include_once 'funciones/conexion.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M </b>G</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Manu </b>García</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav ul-navegador">
        <?php if(($_SESSION['acceso_administrador']) == 1):?>
          <?php
              try {
                $sql = " SELECT id_fiesta, nombre_sala, nombre_evento, fecha, hora_inicio, archivado, observaciones ";
                $sql .= " FROM fiestas ";
                $sql .= " WHERE archivado = 2 limit 1 ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }

              while ($fiesta = $resultado->fetch_assoc()) { 
                    $id_fiesta = $fiesta['id_fiesta'];
                    setlocale(LC_ALL,"es_ES");
                    $fecha_formateada =  strftime("%A, %d %B %G", strtotime($fiesta['fecha']));?>
                    

         <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle enlace" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <p class="parpadea text">Fiesta abierta</p>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <p>
                <?php echo $fiesta['nombre_evento']; ?><br>
                <?php echo $fiesta['nombre_sala']; ?><br><br>
                <?php echo $fiesta['hora_inicio']; ?><br>
                <small><?php echo $fecha_formateada ?><br></small>
                </p>
              </li>
             

              
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
              <?php if($fiesta) {?>
                <?php 
                        $sql = "SELECT COUNT(id_asignaciones) AS asignados, fiesta_id FROM asignaciones WHERE fiesta_id = $id_fiesta ";
                        $resultado = $conn->query($sql);
                        $asignados = $resultado->fetch_assoc();
                        ?>
                  <div class="col-xs-4 text-center">
                    <a href="#">Contratados</a><br>
                    <span class="label label-success"><?php echo $asignados['asignados']; ?></span>
                  </div>
                  <div class="col-xs-4 text-center">
                  <?php 
                        $sql = "SELECT COUNT(id_asignaciones) AS asignados, fiesta_id, fichado FROM asignaciones WHERE fiesta_id = $id_fiesta and fichado = 1 ";
                        $resultado = $conn->query($sql);
                        $fichados = $resultado->fetch_assoc();
                        ?>
                    <a href="#">Fichados</a><br>
                    <span class="label label-success"><?php echo $fichados['asignados']; ?></span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <?php
                        $faltan = $asignados['asignados'] - $fichados['asignados'];
                        if ($faltan == 0){
                          $faltan = "Completa";
                        }
                    ?>
                    <a href="#">Faltan</a><br>
                    <span class="label label-success"><?php echo $faltan ?></span>
                  </div>
                </div>
                <!-- /.row -->
              </li>
                     
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="fiesta-fichar.php" class="btn btn-primary">Fichar</a>
                </div>
                <div class="pull-right">
                  <button id="<?php echo $id_fiesta ?>" type="button" class="btn btn-primary cerrar-fiesta">Cerrar fiesta</button>
                </div>
              </li>
            </ul>
          </li>
          <?php } ?>
       <?php } ?>

   

          <li class="dropdown tasks-menu">
                    <?php 
                        $sql = "SELECT COUNT(id_notas) AS notas FROM notas ";
                        $resultado = $conn->query($sql);
                        $notas = $resultado->fetch_assoc();
                        if($notas['notas'] == 0){
                          $aviso = "";
                          $mensaje = 0;
                        } else {
                          $aviso = $notas['notas'];
                          $mensaje = $notas['notas'];
                        }
                        ?>
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="far fa-edit"></i>
              <span class="label label-danger"><?php echo $aviso; ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Tienes <?php echo $mensaje; ?> notas</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="notas.php">Ver todas</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <?php endif; ?>
    </nav>
  </header>
