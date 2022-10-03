$('#table').DataTable({
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No se encontraron resultados en su busqueda",
        "searchPlaceholder": "Buscar registros",
        "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
        "infoEmpty": "No existen registros",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "search": "Buscar:",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
    }
});
valor = document.getElementById("numerot").value;
if( valor == null || valor.length == 0 || /^\s+$/.test(valor) ) {
    return alert("por favor introduce un numero correcto");
  }
$('#addusuarios').click(function(){

    var n=$('#nombre').val()
    var ap=$('#apellidopaterno').val()
    var am=$('#apellidomaterno').val()
    var nt=$('#numerot').val()
    var con=$('#contraseña').val()

    $.ajax({
    url:baseurl+"Au",
    type:"post",
    data:{
            'nombre':n ,
            'apellidopaterno':ap,
            'apellidomaterno':am,
            'numerot':nt,
            'contraseña':con,
        },
    success: function (data){
            if(data=="ok"){                
                $('#examplemodal').onclick();
                alert("se agregaron los registros correctamente");
                location.reload();
            }
             
            
        }
    });
    

});

$('#eliminar').click(function(){
    var id= $(this).val()
    console.log(id)
    $.ajax({
        url:baseurl+"Eu",
        type:"post",
        data:{
                'id':id                 
            },
        success: function (data){
                if(data=="ok"){                
                   
                    alert("se elimino un usuario correctamente");
                    location.reload();
                }else{
                    alert("algo salio mal intenta de nuevo");
                }
                 
                
            }
        })
});


// el. es para la clase y # es para id
$("#useractive").click(function(){
    $(this).addClass("active")
    // console.log(id)
});


var menues = $(".nav-item li"); 

    // manejador de click sobre todos los elementos
    menues.click(function() {
    // eliminamos active de todos los elementos
    menues.removeClass("active");
    // activamos el elemento clicado.
    $(this).addClass("active");
    });




// // el. es para la clase y # es para id
// $("#addl").click(function(){
//     $('#contenido').empty();
// });





