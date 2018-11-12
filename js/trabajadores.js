$(document).ready(function(){


// se ejecuta cuando hay un archivo


    $('#guardar-registro-archivo').on('submit', function(e){
        e.preventDefault();

        var datos = new FormData(this);

        $.ajax({
            type: $(this). attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            contentType: false,
            processData: false,
            async: true,
            cache: false,
            success: function(data){
                 console.log(data);
              var resultado = data;
              
              if(resultado.respuesta == 'exitoso') {
                  swal (
                      'Correcto',
                      'Se guardó correctamente',
                      'success',
                  ).then(function(){
                      url = "lista-trabajadores.php";
                      $(location).attr("href", url);
                  })
                  
              } else {
                  swal(
                      'Error!',
                      'Revisa el DNI, tiene que ser único por cada trabajador',
                      'error'
                  )
              }

            }
            
        })
         
    });

});