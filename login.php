<?php

        session_start();

      if (!isset($_GET['cerrar_sesion']) == true){
             $cerrar_sesion = false;
      } 
       if (isset($_GET['cerrar_sesion']) == true){
          session_destroy();
       }
  
        include_once 'templates/header.php';
              
?>

<body class="hold-transition login-page">

<div class="login-box">
        <div class="login-logo">
          <a href="index.php"><b>Hola</b></a>
        </div>


  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Inicia sesión</p>


        <form method="post" name="login-admin-form" id="login-admin" action="login-admin.php">
              <div class="form-group has-feedback">
              <i class="fas fa-user"></i>
                    <input type="text" class="form-control" name="usuario" minlength="2" maxlength="50" placeholder="Usuario" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,50}" requeired/>
                    
              </div>
              <div class="form-group has-feedback">
              <i class="fas fa-unlock-alt"></i>
                    <input type="password" class="form-control" name="password" minlength="8" maxlength="40" placeholder="Password" requeired/>
                   
              </div>
              <div class="row">
              
                <!-- /.col -->
                <div class="col-xs-12">
                    <input type="hidden" name="login-admin" value="1">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar sesión</button>
                </div>
                <!-- /.col -->
              </div>
              <br>
              <a href="recuperacion.php">Recuperar contraseña</a>
        </form>

  </div>
  <!-- /.login-box-body -->
</div>





<?php include_once 'templates/footer.php'; ?>