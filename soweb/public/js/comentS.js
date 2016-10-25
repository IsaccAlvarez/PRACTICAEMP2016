$(document).on("submit",".form",function(e) {
     e.preventDefault();
     var idSoli = $("#idSolicitud").val();
     var idUser = $("#idUs").val();
     var comentario = $("#comentari").val();

     var route = '/comentarioSolicitud';
     var token = $("#token").val();
     var datosComent = "idSolicitud="+idSoli+"&idUser="+idUser+"&comentario="+comentario;
     $.ajax({
           url: route,
           headers: {'X-CSRF-TOKEN': token},
           type : 'POST',
           dataType: 'json',
           data:datosComent,
           beforeSend: function(){
               $("#comentar").val("Guardando...");
               $('#comentar').attr('disabled','disabled');
           },
           complete:function(data){
             $("#comentar").val("Guardar");
             $('#comentar').removeAttr('disabled');
           },
           success: function(data){
                    if (data.success == 'true')
                     {
                          $("#myModalComentario").modal('toggle');
                          $("#message-coment").fadeIn();
                          $('#message-coment').show().delay(3000).fadeOut(1);
                          location.href="/comentarioDeSolicitud/"+idSoli+"";
                      }
                  },
                  error:function(data)
                 {
                   $.each(data.responseJSON, function(i, field){
                     $("#errors").append("<ul><li>"+field+"</li></ul>");
                     $("#message-errors").fadeIn();
                     if (data.status == 422) {
                        console.clear();
                     }
                   });
                 }
               });
});

//CUANDO ABRES LA VENTANA MODAL
$("#myModalComentario").on("shown.bs.modal",function() {
  $("#comentari").focus();
});

//CUANDO CIERRAS LA VENTANA MODAL
$("#myModalComentario").on("hidden.bs.modal", function () {
  $("#message-errors").fadeOut()
  $(this).find('form')[0].reset();
  $("label.error").remove();

});
