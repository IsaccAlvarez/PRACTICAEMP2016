// $(document).ready(function() {
//   cargar();
// });

$("#grabar").click(function() {
   var idCont = $("#idContacto2").val();
   var idUser = $("#idUs").val();
   var comentario = $("#comentar").val();

   var route = '/comentario';
   var token = $("#token").val();
   var datosComent = "idContacto="+idCont+"&idUser="+idUser+"&comentario="+comentario;
   $.ajax({
         url: route,
         headers: {'X-CSRF-TOKEN': token},
         type : 'POST',
         dataType: 'json',
         data:datosComent,
         success: function(data){
                  if (data.success == 'true')
                   {
                     console.log(data);
                        $("#message-coment").fadeIn();
                        $('#message-coment').show().delay(3000).fadeOut(1);
                    }
                },
                error:function(data)
               {

               }
             });
});

// cargar = function() {
//   var tablaDatos = $("#dato");
//  	var route = "/comentario";
//
//  	$("#dato").empty();
//  	$.get(route, function(res){
//  		$(res).each(function(key,value){
//  			tablaDatos.append("<tr><td>"+value.name+"</td><td>"+value.created_at+"</td><td>"+value.comentario+"</td>");
//
//  		});
//
//  	});
// }


var list = function(idContacto) {
  var route = "/list/"+idContacto+"";
  var token = $("#token");
  $.ajax({
    type:'get',
    url: route,
    success: function(data){
      $("#comentarios").empty().html(data);
    }
  });
}
