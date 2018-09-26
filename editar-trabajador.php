<?php

$id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT)){
        die("Error");
    }
include_once 'funciones/sesiones.php';
include_once 'funciones/conexion.php';
include_once 'templates/header.php';
include_once 'templates/barra.php';
include_once 'templates/navegacion.php';
if(($_SESSION['acceso_administrador']) == 1):?>
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <section class="content-header">
            <h1>
                Edita los datos del trabajador
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
                    <h3 class="box-title">Cambia los datos pulsando editar</h3>
                    
                    </div>
                
                    <!-- /.box-body -->

                    <?php
                        $sql = "SELECT * FROM trabajadores WHERE id_trabajador = $id ";
                        $resultado = $conn->query($sql);
                        $trabajador = $resultado->fetch_assoc();
                        ?>
                
                    <form role="form" method="post" name="guardar-registro" id="guardar-registro-archivo" action="modelo-trabajadores-editar.php">
                        <div class="box-body">
                                <div class="form-group col-md-12">
                                    <label for="imagen_actual">Imagen Actual</label>
                                    <br>
                                    <img src="img/trabajadores/<?php echo $trabajador['url_foto']; ?>" width="200">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="url_foto">Imagen:</label>
                                    <input class="form-control" type="file" id="url_foto" name="archivo_imagen3">
                                    <p class="help-block">Foto tipo carné del trabajador</p>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="dni">DNI: </label>
                                    <input type="text" class="form-control" id="dni" name="dni" placeholder="ej: 12345678M" value="<?php echo $trabajador['dni'] ?>"readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="nombre">Nombre: </label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $trabajador['nombre'] ?>" minlength="4" maxlength="20" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="primer_apellido">Primer apellido: </label>
                                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" placeholder="Primer apellido" value="<?php echo $trabajador['primer_apellido'] ?>" minlength="4" maxlength="20" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="segundo_apellido">Segundo apellido: </label>
                                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido" placeholder="Segundo apellido" value="<?php echo $trabajador['segundo_apellido'] ?>" maxlength="20">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ss">Número Seguridad Social: </label>
                                    <input type="text" class="form-control" id="ss" name="ss" placeholder="" value="<?php echo $trabajador['ss'] ?>"maxlength="12" minlength="12"/> 
                                    <p class="help-block">Introduce los 12 números sin espacios</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="banco">Número cuenta bancaria: </label>
                                    <input type="text" class="form-control" id="banco" name="banco" placeholder="ES123456789..." value="<?php echo $trabajador['banco'] ?>" placeholder="ES123456789..." maxlength="24" minlength="24">
                                    <p class="help-block">Introduce los 24 carácteres sin espacios</p>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefono">Telefono: </label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="ej: 123456789" value="<?php echo $trabajador['tlf'] ?>" maxlength="9" minlength="9">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email: </label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo $trabajador['email']; ?>">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="imagen_actual">Foto Banco</label>
                                    <br>
                                    <img src="img/trabajadores/<?php echo $trabajador['url_banco']; ?>" width="200">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="imagen_actual">DNI cara A</label>
                                    <br>
                                    <img src="img/trabajadores/<?php echo $trabajador['url_dni_1']; ?>" width="200">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="imagen_actual">DNI cara B</label>
                                    <br>
                                    <img src="img/trabajadores/<?php echo $trabajador['url_dni_2']; ?>" width="200">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="url_banco">Imagen Banco:</label>
                                    <input class="form-control" type="file" id="url_banco" name="archivo_imagen4">
                                    <p class="help-block">Añade foto del banco</p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="url_dni_1">Imagen DNI Cara A:</label>
                                    <input class="form-control" type="file" id="url_dni_1" name="archivo_imagen1">
                                    <p class="help-block">Añade foto del DNI cara A</p>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="url_dni_2">Imagen DNI Cara B:</label>
                                    <input class="form-control" type="file" id="url_dni_2" name="archivo_imagen2">
                                    <p class="help-block">Añade foto del DNI cara B</p>
                                </div>
                                <div>
                                    <label for="observaciones">Observaciones:</label>
                                        <textarea name="observaciones" class="observaciones" id="observaciones" placeholder="Pon las observaciones aquí"
                                        style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $trabajador['observaciones']; ?></textarea>
                                </div> 
                                <div class="form-group">
                                    <label for="ultima_actualizacion">Ultima actualización</label>
                                    <input type="text" value="<?php echo $trabajador['editado'] ?>" disabled>
                                    
                                </div>     
                            </div><!-- box body -->


                            <div class="box-footer">
                                    <a href="ver-trabajador.php?id=<?php echo $id ?>"  class="btn btn-default"><i class="far fa-arrow-alt-circle-left"></i> Atrás</a>
                                    <input type="hidden" name="id" value="<?php echo $id ?>">
                                    <button type="submit" class="btn btn-primary" id="guardar-registro-archivo">Actualizar</button>
                            </div>
                    </form>

                    </div> <!-- box -->
                    </section>
                    </div><!-- col 12-->
                </div><!-- row-->
            </div><!-- /.content-wrapper -->
  



<?php include_once 'templates/footer.php'; 
endif;?>



