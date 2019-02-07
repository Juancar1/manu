<?php
$id_trabajador = $_GET['id'];


        include_once 'funciones/sesiones.php';
        include_once 'funciones/conexion.php';
        include_once 'templates/header.php';
        include_once 'templates/barra.php';
        include_once 'templates/navegacion.php';
        if(($_SESSION['acceso_administrador']) == 1):?>


  <body onload="window.print();">
       <div class="content-wrapper">
           <!-- Main content -->
              <section class="invoice">
                  <div class="row">
                    <div class="col-xs-12">


                                <?php
                                    try {
                                    $sql = " SELECT nombre, primer_apellido, segundo_apellido, dni, url_dni_1, url_dni_2, banco, ss, tlf, email, url_foto, editado, observaciones from trabajadores ";
                                    $sql .= " WHERE id_trabajador = $id_trabajador ";

                                    $resultado = $conn->query($sql);
                                } catch (Exception $e) {
                                    $error = $e->getMessage();
                                    echo $error;
                                }
                                while ($trabajador = $resultado->fetch_assoc()) { ?>
                                        <!-- Content Wrapper. Contains page content -->
                                        <h2 class="page-header">
                                        <i class="far fa-user"></i> <?php echo $trabajador['nombre'] . " / " . $trabajador['primer_apellido'] . " " . $trabajador['segundo_apellido']; ?>
                                        </h2>
                    </div><!-- col-xs-12 -->             
                </div><!-- row -->


                <div class="row">
                    <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Email</th>
                                <th>DNI</th>
                                <th>Banco</th>
                                <th>SS</th>
                                <th>Tlf</th> 
                            </tr>
                        </thead>
                        <br>
               
                        <div> <img src="img/trabajadores/<?php echo $trabajador['url_foto']; ?>" width="150px"></div>
                        <br> 
                        <?php 
                         $banco = $trabajador['banco'];
                         function hiddenString($str, $start = 1, $end = 1){
                             $len = strlen($str);
                             return substr($str, 0, $start) . str_repeat('*', $len - ($start + $end)) . substr($str, $len - $end, $end);
                         }
                        ?>   
                        <tbody>
                            <tr>
                                <td><?php echo $trabajador['email'] ;  ?></td>
                                <td><?php echo $trabajador['dni'] ?></td>
                                <td><?php echo hiddenString($banco,0,5); ?></td>
                                <td><?php echo $trabajador['ss'] ?></td>
                                <td><?php echo $trabajador['tlf'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                  </div><!-- table responsive -->
                </div><!-- row -->


                <div class="row">
                    <div class="col-xs-12">
                    <p class="lead">Foto DNI</p>
                    <div class="table-responsive">
                        <table class="table">
                        <tr class="col-xs-6">
                            <th style="width:50%">Cara A</th>
                            <td><img src="img/trabajadores/<?php echo $trabajador['url_dni_1']; ?>" width="150px"></td>
                        </tr>
                        <tr class="col-xs-6">
                            <th style="width:50%">Cara B</th>
                            <td><img src="img/trabajadores/<?php echo $trabajador['url_dni_2']; ?>" width="150px"></td>
                        </tr>
                        </table>
                    </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="table-responsive">
                            <table>
                                <tr>
                                    <td> <p class="lead">Observaciones</p><?php echo $trabajador['observaciones'];  ?></td>
                                </tr>
                                <tr>
                                    <th>Ultima actualización <?php echo $trabajador['editado']; ?></th>
                                </tr>
                            </table>
                        </div><!-- table responsive -->
                    </div><!-- rcol-xs-12 -->
                </div><!-- row -->
      <br>
  


      <div class="row no-print">
        <div class="col-xs-12">
        <a href="ver-trabajador.php?id=<?php echo $id_trabajador ?>"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
        </div>
      </div>
    </section>
    <?php } ?>

    <div class="clearfix"></div>
  </div>

  <div class="control-sidebar-bg"></div>
</div>
<div id="editor"></div>
</body>
<?php include_once 'templates/footer.php'; 
endif;?>



