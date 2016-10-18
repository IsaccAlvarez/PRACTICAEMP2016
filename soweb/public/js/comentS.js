$("#comentar").click(function() {
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
         success: function(data){
                  if (data.success == 'true')
                   {

                        $("#myModalComentario").modal('toggle');
                        $("#message-coment").fadeIn();
                        $('#message-coment').show().delay(3000).fadeOut(1);
                    }
                },
                error:function(data)
               {

               }
             });
});


//CUANDO ABRES LA VENTANA MODAL
$("#myModalComentario").on("shown.bs.modal",function() {
  $("#comentari").focus();
});

//CUANDO CIERRAS LA VENTANA MODAL
$("#myModalComentario").on("hidden.bs.modal", function () {
  $(this).find('form')[0].reset();
  $("label.error").remove();

});