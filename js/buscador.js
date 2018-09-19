

var inputBuscador = document.getElementById('buscador');
var tableBody = document.getElementsByTagName('tbody');
var inputBuscadorTrabajadores = document.getElementById('buscador-trabajadores');


// buscador en asignación de trabajadores
function ocultarRegistros(nombre_buscar){
    var registros = tableBody[1].getElementsByTagName('tr');

    var expresion = new RegExp(nombre_buscar, "i");

    for(i = 0; i < registros.length; i++){

        registros[i].style.display = 'none';
        
        if(registros[i].childNodes[1].textContent.replace(/\s/g, " ").search(expresion) != -1){
            registros[i].style.display= 'table-row';
        } else if(registros == 0) {
            registros[i].style.display= 'table-row';
        }
    }
}

//buscador de trabajadores
function ocultarRegistrosTrab(nombre_registro){
    var registros = tableBody[0].getElementsByTagName('tr');

    var expresion = new RegExp(nombre_registro, "i");
    
    for(i = 0; i < registros.length; i++){

        registros[i].style.display = 'none';
        
        if(registros[i].childNodes[1].textContent.replace(/\s/g, " ").search(expresion) != -1){
            registros[i].style.display= 'table-row';
        } else if(registros == 0) {
            registros[i].style.display= 'table-row';
        }
    }
}

if (inputBuscadorTrabajadores){
inputBuscadorTrabajadores.addEventListener('input', function(){
   ocultarRegistrosTrab(this.value);
})
}
if (inputBuscador){
inputBuscador.addEventListener('input', function(){
      ocultarRegistros(this.value);
});
}


