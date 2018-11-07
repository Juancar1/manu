

     const formularioAdmin = document.querySelector('#crear-admin');
     const formulario = document.querySelector('#modificar-contrasena');

// Crea un nuevo admin
$('#crear-admin').on('submit', function (e) {
    e.preventDefault();
   
        
          const trabajador =  $('#trabajador_select_usuario').val();

            // validación para usuario
            var expregNombre = new RegExp("[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,50}");
            if(expregNombre.test($('#nombre_admin').val())){
                const nombre = $('#nombre_admin').val();

            // validación para contraseña
            var expregPassword = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{8,40}$");
            if(expregPassword.test($('#password_admin').val())){
                const password = $('#password_admin').val();

            // Validación de desplegable
            if(trabajador == 0){
                mostrarNotificacion('Selecciona en el menú desplegable a un trabajador', 'error');
           } else {

                envioAjax(nombre, password,trabajador);

            } 
              }  else {
                text = 'Contraseña: Al menos... Una letra en mayuscula, Una letra en minuscula, Un dígito, Un caracter especial';
                mostrarNotificacion(text, 'error');
              }
            } else {
                mostrarNotificacion('El nombre de usuario tiene que ser único', 'error');
            }
     
 

});

    function envioAjax(nombre,password,trabajador){


        $.ajax({
            type: 'post',
            data: {
                'id_trabajador': trabajador,
                'registro' : "nuevo-admin",
                'nombre': nombre,
                'password': password
    
            },
            url: 'modelo-admin.php',
            success: function (data) {
                console.log(data);
                var resultado = JSON.parse(data);
                if(resultado.respuesta == 'exito-admin'){
                    mostrarNotificacion('El ususario y contraseña se registraron con exito', 'correcto');
                // setTimeout(function () {
                //    window.location.href = 'index.php';
                //     }, 3000)
                } else {
                    mostrarNotificacion('Este trabajador ya tiene asignado un usuario y contraseña', 'error');
                }
                
             }

         });

} 
   
    // Notificación en pantalla
function mostrarNotificacion (mensaje, clase) {
    const notificacion = document.createElement('div');
    notificacion.classList.add(clase, 'notificacion', 'sombra');
    notificacion.textContent = mensaje;

    // formulario
    //en la siguiente linea en insertBefore: primero que vamos a insertar, despues dónde
    if (formularioAdmin){
    formularioAdmin.insertBefore(notificacion, document.querySelector('form legend'));
    }
    if (formulario){
        formulario.insertBefore(notificacion, document.querySelector('form legend'));
    }
    // Ocultar y Mostrar la notificacion
    setTimeout(() => {
        notificacion.classList.add('visible');
        setTimeout(() => {
            notificacion.classList.remove('visible');
            setTimeout(() => {
                notificacion.remove();
            }, 500);
        }, 3000);
    },100);
}


// Cambiar contraseña
$('#modificar-contrasena').on('submit', function (e) {
    e.preventDefault();
  
   

        var expregPassword = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{8,40}$");
        if(expregPassword.test($('#password').val())){
            const password2 = $('#password').val();
            envioAjax2(password2);

        }  else {
            text = 'Contraseña: Al menos... Una letra en mayuscula, Una letra en minuscula, Un dígito y Un caracter especial';
            mostrarNotificacion(text, 'error');
            
          }
   
});

function envioAjax2(password2){


    $.ajax({
        type: 'post',
        data: {
            'password': 'modificar',
            'password2': password2

        },
        url: 'modelo-admin-editar.php',
        success: function (data) {
            console.log(data);
            var resultado = JSON.parse(data);
            
            mostrarNotificacion('El ususario y contraseña se registraron con exito', 'correcto');
            setTimeout(function () {
               window.location.href = 'index.php';
                }, 3000)
         }

     });

} 



 // Da acceso o lo quita a administradores
 $('.editar_admin').on('click', function (e) {
    e.preventDefault();

        var id_admin = $(this).attr('data-id');
        var tipo = $(this).attr('data-tipo');
        var acceso = $(this).attr('acceso');
        var usuario = $(this).attr('usuario');

        swal({
          title: 'Estás seguro??',
          text: "Vas a cambiar el estado de acceso a " + usuario,
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Adelante, Sí!',
          cancelButtonText: 'cancelar'
        }).then((result) => {
          if (result.value) {
          $.ajax({
            type: 'post',
            data: {
              'id_admin': id_admin,
              'usuario' : usuario,
              'acceso' : acceso,
              'registro': 'modificar'
            },
            url: 'modelo-' + tipo + '.php',
            success: function (data) {
              console.log(data);
              var resultado = JSON.parse(data);
              if (resultado.respuesta == 'exito') {
                if (result.value) {
                  swal(
                    'Modificado!',
                    'Has cambiado el estado.',
                    'success'
                  )
                  setTimeout(function () {
                    window.location.href = 'lista-admin.php';
                  }, 500)
                  if(resultado.acceso == '1'){
                    $("#acceso_administrador").val("Con acceso");
                  } else {
                    $("#acceso_administrador").val("Sin acceso");
                  }
                }
              } else {
                swal(
                  'Error',
                  'No se pudo eliminar',
                  'error'
                )
              }
    
            }
    
          })
        }
          
        })
    
        

    })





 
