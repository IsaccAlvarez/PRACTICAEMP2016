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
