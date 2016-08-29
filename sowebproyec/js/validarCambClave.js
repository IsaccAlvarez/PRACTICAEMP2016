/**
 * Created by jmora on 24/8/2016.
 */
function btnCancelar(){
   var respuesta = alertify.confirm( "Cancelar","¿Desea guardar la información?",null,null).set('labels', {ok:'Si',cancel:'No'});
    respuesta.set({transition:'slide'});
    respuesta.set('onok',function () {
        $("#guardar").submit(enviar());
    });
    respuesta.set('oncancel',function () {
       window.location = '../index.php';
    });
    return respuesta;
}

function enviar() {
    $(".formCambioClave").bind("submit",function(){
        $.ajax({
            type: $(this).attr("method"),
            url: $(this).attr("action"),
            data:$(this).serialize(),

            beforeSend: function(){
                $("#guardar").text("Guardando...");
                $('#guardar').attr("disable",true);
            },
            complete:function(data){
                $("#guardar").text("Guardar");
                $('#guardar').attr("disable",false);
            },
            success: function(data){
                if(data == "true"){
                    var alerta = alertify.alert("¡Exito!","La información se guardó exitosamente").set('label', 'Aceptar');
                    alerta.set('onok',function () {
                        document.location.href="../index.php";
                    })


                }else{
                    $("#resultado").html(data);
                    $('#claveAct').val('');
                    $('#passNew').val('');
                    $('#pass2').val('');

                }

            },
            error: function(data){
                // que hacer si se cumplio la petición
                alert("falso");
            }


        });

        return false;


    });
}
$(document).ready(function(){

    $("#guardar").submit(enviar());

});
