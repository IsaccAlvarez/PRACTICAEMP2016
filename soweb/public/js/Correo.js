

//enviar correo
$(document).on("submit",".form",function(e){
        e.preventDefault();
        var formu=$(this);
        var nombreform=$(this).attr("id");
        var rs=false;
        var seccion_sel=  $("#seccion_seleccionada").val();
         if(nombreform=="enviarLista" ){
           var miurl="enviar_correo";  }
         if(nombreform=="enviarListaContacto"){
           var miurl="enviarContacto"; }
        if(nombreform=="enviarListaSolicitud"){
          var miurl="enviarSolicitud"; }

        //información del formulario
        var formData = new FormData($("#"+nombreform+"")[0]);

        //hacemos la petición ajax
        $.ajax({
            url: miurl,
            type: 'POST',

            // Form data
            //datos del formulario
            data: formData,

        });

});

window.setTimeout(function(){
  $(".alertCorreo").fadeTo(500,0).slideUp(500,function(){
    $(this).remove();
  });
}, 4000);
