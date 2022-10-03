var bandera=0;

document.getElementById("registro-usuarios").addEventListener("click",function(){
  if(bandera==0 || bandera==2){
    $.ajax({
      url:baseurl+"Dashboard/getusuarios",
      type:"post",
      success: function (data){
                $('#contenido').empty();
                $('#contenido').append(data);
                bandera=1
              }
    });
  }
});

document.getElementById("permisos-usuarios").addEventListener("click",function(){
  if(bandera==0 || bandera==1){
    $.ajax({
      url:baseurl+"Dashboard/permisos",
      type:"post",
      success:function (data){
        $('#contenido').empty();
        $('#contenido').append(data);
        bandera=2;
      }
    });
  }
});