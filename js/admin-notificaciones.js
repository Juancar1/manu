$(document).ready(function () {

    
//  const formulario = document.querySelector('#modificar-contrasena');


// // Cambiar contraseña
// $('#modificar-contrasena').on('submit', function (e) {
//     e.preventDefault();
  
   

//         var expregPassword = new RegExp("^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-_]).{8,40}$");
//         if(expregPassword.test($('#password').val())){
//             const password2 = $('#password').val();
//             envioAjax2(password2);

//         }  else {
//             text = 'Contraseña: Al menos... Una letra en mayuscula, Una letra en minuscula, Un dígito y Un caracter especial';
//             mostrarNotificacion(text, 'error');
            
//           }
   
// });

    // Notificación en pantalla cambio de contraseña
    // function mostrarNotificacion (mensaje, clase) {
    //     const notificacion = document.createElement('div');
    //     notificacion.classList.add(clase, 'notificacion', 'sombra');
    //     notificacion.textContent = mensaje;
    
    //     // formulario
    //     //en la siguiente linea en insertBefore: primero que vamos a insertar, despues dónde
    //     formulario.insertBefore(notificacion, document.querySelector('form legend'));
    
    //     // Ocultar y Mostrar la notificacion
    //     setTimeout(() => {
    //         notificacion.classList.add('visible');
    //         setTimeout(() => {
    //             notificacion.classList.remove('visible');
    //             setTimeout(() => {
    //                 notificacion.remove();
    //             }, 500);
    //         }, 3000);
    //     },100);
    // }


//     function envioAjax2(password2){


//         $.ajax({
//             type: 'post',
//             data: {
//                 'password': 'modificar',
//                 'password2': password2
    
//             },
//             url: 'modelo-admin-editar.php',
//             success: function (data) {
//                 console.log(data);
//                 var resultado = JSON.parse(data);
                
//                 mostrarNotificacion('El ususario y contraseña se registraron con exito', 'correcto');
//                 setTimeout(function () {
//                    window.location.href = 'index.php';
//                     }, 3000)
//              }

//          });

//  } 




});

