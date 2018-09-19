<?php
include_once 'templates/header.php';
?>

<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href=""><b>Manu</b> García</a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name">Introduce tu correo</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    
    

    <form class="lockscreen-credentials" role="form" method="post" name="recuperar-contrasena" id="recuperar-contrasena" action="modelo-recuperar.php">
        <div class="input-group">
                <label for="usuario"></label>
                <input type="email" class="form-control" placeholder="Email" name="usuario">
                
                
                <div class="input-group-btn">
                <button type="submit" class="btn" id="recuperar-contrasena"><i class="fa fa-arrow-right text-muted"></i></button>
          </div>
        </div>
    </form>


  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Sólo Manu García está autorizado para recuperar su contraseña
  </div>
 
</div>

<?php include_once 'templates/footer.php'; ?>
