$(document).ready(function () {


    // CUENTA REGRESIVA
    $(function () {

        var diasEvento = $('#fecha').val();
        var horaEvento = $('#hora').val();
        fechaHoraEvento = diasEvento + " " + horaEvento;

       

        $('#cuenta-atras').countdown(fechaHoraEvento)

        // 5 horas antes, el contador se ve
        .on('update.countdown', function (event) {

          var dias = event.strftime('%D');
          var horas = event.strftime('%H');
          var minutos = event.strftime('%M');

          if ((dias == 0) && (horas < 5)){
          $(this).text(event.strftime('%M:%S'));
        }
     })
        // contador a cero, registro en base de datos y mensaje
        .on('finish.countdown', function (event) {
            $(this).text('Empieza la fiesta');

                    td = $('#cuenta-atras').parent();
                    id = td[0].getAttribute('id');
      
      
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
                          
                            $('.ul-navegador').prepend('<li class="dropdown user user-menu"><a href="#" class="dropdown-toggle enlace" data-toggle="dropdown"><p class="parpadea text">Fiesta abierta</p></a>');
                            
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