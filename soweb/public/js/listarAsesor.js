$(document).ready(function(){


 var tablaDatos = $("#datos");
 var route = "http://localhost:8000/asesor";

 $("#datos").empty();

 $.get(route, function(res){
     $("res").each(function(key,value){
       tablaDatos.append("<tr><td>"+value.idAsesor+"</td><td>"+value.nombre+"</td><td>"+value.iniciales+"</td><td>"+value.estado+"</td><td>"+value.telefono+"</td><td>"+value.emailEmpresa+"</td><td><button class='btn btn-primary'>Editar</button><button class='btn btn-danger'>Eliminar</button></td></tr>");
     });
 });

});
