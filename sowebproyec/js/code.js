$(document).ready(ini);
function ini(){

    //$("#login").click(validar);

    //validar el form
    $(".form-login").bind("submit",function(){
     $.ajax({
         type: $(this).attr("method"),
         url: $(this).attr("action"),
         data:$(this).serialize(),

         beforeSend: function(){
             $("#enviar").text("Enviando...");
             $('#enviar').attr("disable",true);
         },
         complete:function(data){
           $("#enviar").text("Iniciar Sesion");
           $('#enviar').attr("disable",false);
         },
         success: function(data){
          if(data =="true"){
              document.location.href="admin.php";
            }else{
               $("#resultado").html("<div class='alert alert-danger' role='alert'><b>Acceso denegado, </b> Email o Contraseña Incorrectas</div>");
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
