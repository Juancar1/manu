<?php
$id_trabajador = $_GET['id'];

if (!filter_var($id_trabajador, FILTER_VALIDATE_INT)) {
  die("Error");
}
      include_once 'funciones/sesiones.php';
      include_once 'funciones/conexion.php';
      include_once 'templates/header.php';
      include_once 'templates/barra.php';
      include_once 'templates/navegacion.php';
      if(($_SESSION['acceso_administrador']) == 1):?>




  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Servicio de mail
        <small>Vas a mandar datos personales</small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box primary">
        <div class="box-body">

            <?php
               try {
                $sql = " SELECT nombre, primer_apellido, segundo_apellido, dni, url_dni_1, url_dni_2, banco, ss, tlf, email, url_foto, editado, observaciones, ultimo_email_ficha from trabajadores ";
                $sql .= " WHERE id_trabajador = $id_trabajador ";

                $resultado = $conn->query($sql);
              } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
              }
              while ($trabajador = $resultado->fetch_assoc()) { ?>
               <?php       
                            $banco = $trabajador['banco'];
                            function hiddenString($str, $start = 1, $end = 1){
                            $len = strlen($str);
                            return substr($str, 0, $start) . str_repeat('*', $len - ($start + $end)) . substr($str, $len - $end, $end);
                        }?>

           <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Envío de datos personales de <?php echo $trabajador['nombre'] . "  " . $trabajador['primer_apellido']. "  " . $trabajador['segundo_apellido']; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <input class="form-control" placeholder="Para:" value="<?php echo $trabajador['email'] ?>">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Motivo:" value="Envío de datos personales">
              </div>
            
              <!-- <form role="form" method="post" name="guardar-registro" id="" action="modelo-email.php?id=<?php echo $id_trabajador ?>"> -->
            
              <div class="form-group">
                    <textarea id="compose-textarea" name="textarea" class="form-control compose-textarea" style="height: 300px">
                      <h1>Hola <?php echo $trabajador['nombre'];?></h1>
                      <h2><u>Estos son tus datos personales</u></h1>
                      <p>Revisa minuciosamente todos tus datos para actualizar correctamente tu ficha</p>
                      <ul>
                        
                        <li>Primer apellido  <?php echo $trabajador['primer_apellido'];  ?></li>
                        <li>Segundo apellido  <?php echo $trabajador['segundo_apellido']; ?></li>
                        <li>DNI  <?php echo $trabajador['dni']; ?></li>
                        <li>SS  <?php echo $trabajador['ss']; ?></li>
                        <li>Teléfono  <?php echo $trabajador['tlf']; ?></li>
                        <li>Banco: <?php echo hiddenString($banco,0,5); ?></li>
                      </ul>
                      <p>Si hay algún error, puedes contestar a este email detallando que dato hay que corregir o actualizar a la mayor brevedad posible</p>
                      <p>Muchas gracias por tu tiempo</p>
                      <p>Atentamente, Manu García</p>
                    </textarea>
                   
              </div>


          
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <button id="enviar-email-ficha" tipo="email-ficha" id-trabajador="<?php echo $id_trabajador ?>" email="<?php echo $trabajador['email']; ?>" type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar</button>
              </div>
              <div>
              <a href="ver-trabajador.php?id=<?php echo $id_trabajador ?>" class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
              </div>
            </div>
                    <?php 
                    setlocale(LC_ALL,"es_ES"); 
                    $fecha_formateada =  strftime("%A, %d %B %G %H:%M", strtotime($trabajador['ultimo_email_ficha']));
                    if($fecha_formateada === 0){
                      $fecha_formateada =  "No se ha enviado ningún email";
                    } else {
                      $fecha_formateada = $fecha_formateada;}?>

            <div class="ultimo-email"><strong>Último email enviado: </strong><?php echo $fecha_formateada; ?></div>
        <?php } ?>
      </div>
     </section>
     </div>
  </div>
<?php include_once 'templates/footer.php'; 
endif;?>