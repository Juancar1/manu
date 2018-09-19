$(document).ready(function(){
    $('#guardar-nota').on('submit', function(e){
        e.preventDefault();
        
        var datos = $(this).serializeArray();

        $.ajax({
            type: $(this). attr('method'),
            data: datos,
            url: $(this).attr('action'),
            dataType: 'json',
            success: function(data){
                // console.log(data);
              var resultado = data;
              if(resultado.respuesta == 'exito') {
                  swal (
                      'Correcto',
                      'Tu nota se guardó correctamente, puedes visualizarla más abajo',
                      'success'
                  )  
                  setTimeout(function () {
                    window.location.href = 'notas.php';
                  }, 2000)
              } else {
                  swal(
                      'Error!',
                      'Hubo un error, asegúrate de haber escrito en el recuadro',
                      'error'
                  )
              }
            }
        })
    });
    
});