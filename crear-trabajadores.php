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
        Crear un trabajador
        <small></small>
      </h1>
      
    </section>

    <div class="row">
      <div class="col-md-12">

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Rellena el formulario para dar de alta a un nuevo trabajador</h3>
        </div>
       
        <!-- /.box-body -->
       
        <form role="form" method="post" name="guardar-registro-archivo" id="guardar-registro-archivo" action="modelo-trabajadores.php">
              <div class="box-body">
                      <div class="form-group col-md-12">
                        <label for="url_foto">Imagen:</label>
                        <input class="form-control" type="file" id="url_foto" name="archivo_imagen3" accept="image/png, .jpeg, .jpg, image/gif">
                        <p class="help-block">Foto tipo carné del trabajador</p>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="nombre">Nombre: </label>
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" minlength="2" maxlength="20" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,20}" required/>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="primer_apellido">Primer apellido: </label>
                          <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido" minlength="2" maxlength="20" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,20}" required/>
                      </div>
                      <div class="form-group col-md-4">
                          <label for="segundo_apellido">Segundo apellido: </label>
                          <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido" maxlength="20" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{20}"/>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="ss">Número Seguridad Social: </label>
                          <input type="text" class="form-control" id="ss" name="ss" placeholder="" maxlength="12" minlength="12" pattern="[0-9]{12}" /> 
                          <p class="help-block">Introduce los 12 números sin espacios</p>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="banco">Número cuenta bancaria: </label>
                          <input type="text" class="form-control" id="banco" name="banco" placeholder="ES123456789..." minlength="24" maxlength="24" pattern="[ES]{2}[0-9]{22}">
                          <p class="help-block">Introduce los 24 carácteres sin espacios</p>
                      </div>
                      <div class="form-group col-md-6">
                          <label for="telefono">Telefono: </label>
                          <input type="tel" pattern="[0-9]{9}" class="form-control" id="telefono" name="telefono" placeholder="ej: 123456789" maxlength="9" minlength="9">
                      </div>
                      <div class="form-group col-md-6">
                          <label for="email">Email: </label>
                          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
                          <small id="emailHelp" class="form-text text-muted"></small>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="dni">DNI: </label>
                          <input type="text" pattern="(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))" class="form-control" id="dni" name="dni" placeholder="ej: 12345678M" maxlength="9" minlength="9" required>
                      </div>
                      <div class="form-group col-md-3">
                        <label for="url_dni_1">Imagen:</label>
                        <input class="form-control" type="file" id="url_dni_1" name="archivo_imagen1" accept="image/png, .jpeg, .jpg, image/gif">
                        <p class="help-block">Añade foto del DNI cara A</p>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="url_dni_2">Imagen:</label>
                          <input class="form-control" type="file" id="url_dni_2" name="archivo_imagen2" accept="image/png, .jpeg, .jpg, image/gif">
                          <p class="help-block">Añade foto del DNI cara B</p>
                      </div>
                      <div class="form-group col-md-3">
                          <label for="url_banco">Imagen:</label>
                          <input class="form-control" type="file" id="url_dni_4" name="archivo_imagen4" accept="image/png, .jpeg, .jpg, image/gif">
                          <p class="help-block">Añade foto banco</p>
                      </div>
                      
                     
                      
                      
                      
                      <div>
                        <label for="observaciones">Observaciones:</label>
                            <textarea name="observaciones" class="observaciones" id="observaciones" placeholder="Pon las observaciones aquí"
                            style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>      
                </div><!-- box body -->


                  <div class="box-footer">
                        <input type="hidden" name="registro_trabajador" value="nuevo">
                        <button type="submit" class="btn btn-primary" id="guardar-registro-archivo">Añadir</button>
                  </div>
          </form>

         </div> <!-- box -->
       </section>
    </div><!-- col 8-->
   </div><!-- row-->
</div><!-- /.content-wrapper -->
  



<?php include_once 'templates/footer.php'; 
endif;?>



