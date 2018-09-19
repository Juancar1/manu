  // email envio de ficha

  $('#enviar-email-ficha').on('click', function (e) {
    e.preventDefault();
      var email = $(this).attr('email');
      var textarea = $("#compose-textarea").val();
      var tipo = $(this).attr('tipo');
      var id_trabajador = $(this).attr('id-trabajador');


       
     swal({
      title: 'Estás seguro??',
      text: "Vas a agregar a ",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Agregar',
      cancelButtonText: 'cancelar'
    }).then((result) => {
      $.ajax({
        type: 'post',
        data: {
          'id_trabajador': id_trabajador,
          'textarea' : textarea,
          'email' : email
        },
        url: 'modelo-' + tipo + '.php',
        success: function (data) {
          console.log(data);
          var resultado = JSON.parse(data);
          if (resultado.respuesta == 'exito') {
            if (result.value) {
              swal(
                'Enviado!',
                'El email se ha enviado correctamente',
                'success'
              )
            }
          } else {
            swal(
              'Error',
              'Ha ocurrido algún error',
              'error'
            )
          }

        }

      })
    })


  });

  

   // email envio de fiestas asignadas

   $('#enviar-email-asignaciones').on('click', function (e) {
    e.preventDefault();
    
      var email = $("#email").val();
      var textarea = $("#compose-textarea").val();
      var tipo = $(this).attr('tipo');
      var id_trabajador = $(this).attr('id-trabajador');
      
      swal({
        title: 'Estás seguro??',
        text: "Vas a agregar a ",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Agregar',
        cancelButtonText: 'cancelar'
      }).then((result) => {
        $.ajax({
          type: 'post',
          data: {
            'id_trabajador': 65,
            'textarea' : 'textarea',
            'email' : 'juancarpliego@gmail.com'
          },
          url: 'modelo-email-asignaciones.php',
          success: function (data) {
            console.log(data);
            var resultado = JSON.parse(data);
            if (resultado.respuesta == 'exito') {
              if (result.value) {
                swal(
                  'Agregado!',
                  'El email se ha enviado correctamente',
                  'success'
              )
            }
          } else {
            swal(
              'Error',
              'Ha ocurrido algún error',
              'error'
            )
          }

        }

      })
    })


  });

  