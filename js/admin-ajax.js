$(document).ready(function () {


  $('#guardar-registro').on('submit', function (e) {
    e.preventDefault();

    var datos = $(this).serializeArray();

    $.ajax({
      type: $(this).attr('method'),
      data: datos,
      url: $(this).attr('action'),
      dataType: 'json',
      success: function (data) {
        console.log(data);
        var resultado = data;
        if (resultado.respuesta == 'exito') {
          swal(
            'Correcto',
            'Se guardó correctamente',
            'success'
          )
          setTimeout(function () {
            window.location.href = 'index.php';
          }, 2000)
        } else {
          swal(
            'Error!',
            'Hubo un error',
            'error'
          )
        }
      }
    })
  });

  // Eliminar un registro
  // Eliminar nota
  // Elimina puesto

  $('.borrar_registro').on('click', function (e) {
    e.preventDefault();

    var id = $(this).attr('data-id');
    var tipo = $(this).attr('data-tipo');

    swal({
      title: 'Estás seguro??',
      text: "Un registro eliminado no se puede recuperar!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar!',
      cancelButtonText: 'cancelar'
    }).then((result) => {
      if (result.value) {
      $.ajax({
        type: 'post',
        data: {
          'id': id,
          'registro': 'eliminar',

        },
        url: 'modelo-' + tipo + '.php',
        success: function (data) {
          console.log(data);
          var resultado = JSON.parse(data);
          if (resultado.respuesta == 'exito') {
            if (result.value) {
              swal(
                'Eliminado!',
                'Registro Eliminado.',
                'success'
              )
              jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
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

  });

 


  $('.asignar_trabajador').on('click', function (e) {
    e.preventDefault();

    var id_trabajador = $(this).attr('id-trabajador');
    var tipo = $(this).attr('name');
    var id_fiesta = $(this).attr('id-fiesta');
    var nombre_trabajador = $(this).attr('nombre-trabajador');
    var puesto = $( "#puesto" ).val();
    

    swal({
      title: 'Estás seguro??',
      text: "Vas a agregar a " + nombre_trabajador,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Agregar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.value) {
      $.ajax({
        type: 'post',
        data: {
          'id_trabajador': id_trabajador,
          'id_fiesta' : id_fiesta,
          'registro': 'agregar',
          'puesto' : puesto

        },
        url: 'modelo-' + tipo + '.php',
        success: function (data) {
          console.log(data);
          var resultado = JSON.parse(data);
          if (resultado.respuesta == 'exito') {
            if (result.value) {
              swal(
                'Agregado!',
                'Trabajador agregado.',
                'success'
              )
             // jQuery('[data-id="' + resultado.id_eliminado + '"]').parents('tr').remove();
            }
          } else {
            swal(
              'Error',
              'Tienes que asignar un puesto al trabajador',
              'error'
            )
          }

        }

      })
    }
    })


  });

  

  // asignacion de puesto a un trabajador
  $('.asignar_trabajador_select').on('click', function (e) {
    e.preventDefault();

    var id_trabajador = $('#trabajador_select').val();
    var tipo = 'asignaciones'
    var id_fiesta = $('#fiesta_select').val();
    var puesto = $("#puesto_select" ).val();
    var email_enviado = 0;


    swal({
      title: 'Estás seguro??',
      text: "Vas a crear una asignación",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Agregar',
      cancelButtonText: 'cancelar'
    }).then((result) => {
      if (result.value) {
      $.ajax({
        type: 'post',
        data: {
          'id_trabajador': id_trabajador,
          'id_fiesta' : id_fiesta,
          'registro': 'agregar',
          'puesto' : puesto,
          'email_enviado' : email_enviado

        },
        url: 'modelo-' + tipo + '.php',
        success: function (data) {
          console.log(data);
          var resultado = JSON.parse(data);
          if (resultado.respuesta == 'exito') {
            if (result.value) {
              swal(
                'Agregado!',
                'Trabajador agregado.',
                'success'
              )
              setTimeout(function () {
                window.location.href = 'lista-asignacion.php';
              }, 2000)
            }
          } else {
            swal(
              'Error',
              'Tienes que rellenar todos los campos',
              'error'
            )
          }

        }

      })
    }
    })


  });

  //ficha a los trabajadores a las fiestas
  $('.ficha-trabajador').on('click', function(e){
    e.preventDefault();

    var id = $(this).attr('id');
    var nombre_trabajador = $(this).attr('nombre');

    swal({
      title: 'Estás seguro??',
      text: "Ha llegado a su puesto de trabajo " + nombre_trabajador + " ? " ,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Fichar',
      cancelButtonText: 'cancelar'
    }).then((result) => {
      if (result.value) {
      $.ajax({
        type: 'post',
        data: {
          'id_asignaciones': id
        },
        url: 'modelo-asignaciones.php',
        success: function (data) {
          console.log(data);
          var resultado = JSON.parse(data);
          if (resultado.respuesta == 'fichado') {
            if (result.value) {
              swal(
                'Fichado!',
                'Trabajador fichado.',
                'success'
              )
           jQuery('[id="' + resultado.id_fichado + '"]').parents('tr').remove();
           location.reload(true);
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



  // elimina un trabajador asignado a una fiesta
  $('.eliminar_asignacion').on('click', function (e) {
    e.preventDefault();

    var id_trabajador = $(this).attr('id-trabajador');
    var tipo = $(this).attr('name');
    var id_fiesta = $(this).attr('id-fiesta');
    var nombre_trabajador = $(this).attr('nombre-trabajador');


    swal({
      title: 'Estás seguro??',
      text: "Vas a eliminar a " + nombre_trabajador,
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Eliminar',
      cancelButtonText: 'cancelar'

    }).then((result) => {
      if (result.value) {
      $.ajax({
        type: 'post',
        data: {
          'id_trabajador': id_trabajador,
          'id_fiesta' : id_fiesta,
          'registro': 'eliminar'
        },
        url: 'modelo-' + tipo + '.php',
        success: function (data) {
          console.log(data);
          var resultado = JSON.parse(data);
          if (resultado.respuesta == 'exito') {
            if (result.value) {
              swal(
                'Agregado!',
                'Trabajador agregado.',
                'success'
              )
             location.reload(true);
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
    

  });

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

});
