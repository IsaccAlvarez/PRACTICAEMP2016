$(document).ready(ini);
function ini(){

    

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
              document.location.href="panel.php";
            }else{
               $("#resultado").html("<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert'>&times;</button> Correo o Clave de acceso incorrectos</div>");
               $(':password').val('');

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
