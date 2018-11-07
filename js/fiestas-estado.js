$(document).ready(function () {



     $(function () {

        var diasEvento = $('#fecha_activa').val();
        var horaEvento = $('#hora_activa').val();
        
        fechaHoraEvento = diasEvento + " " + horaEvento;

       

        $('#cuenta-atras-activa').countdown(fechaHoraEvento)

       
        .on('update.countdown', function (event) {

     })


        //contador a cero, registro en base de datos y mensaje
        .on('finish.countdown', function (event) {
            
  
                   
                    var id = $('#id_activa').val();
        
        
                       $.ajax({
                         type: 'post',
                         data: {
                           'id_fiesta': id,
                           'archivado' : 2 
                         },
                         url: 'modelo-fiesta-activa.php',
                         success: function (data) {
                           console.log(data);
                           var resultado = JSON.parse(data);
                           if (resultado.respuesta == 'archivado') {
                            
  
                             location.reload(true);
                           
                           }
                        } 
                        
                
                   })
    
          
           })

     });


    // cerrar fiesta
    $('.cerrar-fiesta').on('click', function (e) {
        e.preventDefault();

        var id_fiesta = $(this).attr('id');

        (async function getText () {
            const {value: text} = swal({

              input: 'textarea',
              inputPlaceholder: 'Type your message here...',
              showCancelButton: true,
              title: 'Observaciones',
              text: 'Cierra esta fiesta con algún comentario'

            }).then((result) => {
                if (result.value) {
                $.ajax({
                  type: 'post',
                  data: {
                    'id_fiesta': id_fiesta,
                    'archivado': 3,
                    'observaciones' : result.value
          
                  },
                  url: 'modelo-fiesta-activa.php',
                  success: function (data) {
                    console.log(data);
                    var resultado = JSON.parse(data);
                    if (resultado.respuesta == 'archivada') {
                      if (result.value) {
                        swal(
                          'Registrada!',
                          'Esta fiesta ha quedado registrada.',
                          'success'
                        )
                        setTimeout(function () {
                          window.location.href = 'fiesta-fichar.php';
                        }, 2000)
                      }
                    } else {
                      swal(
                        'Error',
                        'Error en registrar',
                        'error'
                      )
                    }
          
                  }
          
                })
              }
              })
         })()

    });



});