$(document).ready(function() {
  listUser();

});
//---------------------------------------------------

$("#ver").change(function() {
  if ($(this).prop("checked")) {
    $("#pas1").show();
    $("#pas2").show();
  }else {
    $("#pas1").hide();
    $("#pas2").hide();
  }
})

//---------------------------------------------------
var listUser = function() {
  $.ajax({
    type:'get',
    url:'listUser',
    success: function(data){
      $("#listU").empty().html(data);
    }
  });
}
//------------------------------------------------------------
$("#guardar").click(function(){
  var nombre = $("#name").val();
  var email = $("#email").val();
  var tipUs = $("#tUsers").val();
  var password = $("#password").val();
  var password_confirmation = $("#pas2").val();

 var route = '/usuario';
  var token = $("#token").val();

   $.ajax({
         url: route,
         headers: {'X-CSRF-TOKEN': token},
         type: 'POST',
         dataType: 'json',
         data:{
           name: nombre,
           email: email,
           tipoUser: tipUs,
           password: password,
           password_confirmation: password_confirmation
         },

        success:function(data){
          if (data.success == 'true') {
            console.log(data);
            listUser();
            $("#myModalCreateUser").modal('toggle');
            $("#message-save").fadeIn();
            $('#message-save').show().delay(3000).fadeOut(1);
          }
        },
        error:function(data){
          $.each(data.responseJSON, function(i, field){
            $("#errorCreate").append("<ul><li>"+field+"</li></ul>");
            $("#message-errorCreate").fadeIn();
            if (data.status == 422) {
              //  console.clear();
            }
          });
        }
   });
});
//--------------

var Mostrar = function(id)
{
  var route = "/usuario/"+id+"/edit";
  $.get(route, function(data){

    $("#id").val(data.id);
    $("#nam").val(data.name);
    $("#emai").val(data.email);
    $("#tUse").val(data.tipoUser);
    $("#pass").val(data.password);
    $("#pass2").val(data.password);



  });
}

//actualizar registros
$("#actualizar").click(function() {
  var id = $("#id").val();
  var nombr = $("#nam").val();
  var correo = $("#emai").val();
  var tipoU = $("#tUse").val();
  var clave = $("#pass").val();
  var password_confirmation2 = $("#pass2").val();

  var route = "/usuario/"+id+"";

  var token = $("#token").val();

 $.ajax({
   url: route,
   headers: {'X-CSRF-TOKEN': token},
   type : 'PUT',
   dataType: 'json',
   data:{name: nombr,
         email: correo,
         tipoUser: tipoU,
         password: clave,
         password_confirmation: password_confirmation2},
     success: function(data){
        if (data.success == 'true')
         {
            listUser();
            $("#myModalEditUser").modal('toggle');
            $("#message-update").fadeIn();
            $('#message-update').show().delay(3000).fadeOut(1);
        }
    },
    error:function(data)
   {
        $.each(data.responseJSON, function(i, field){
          $("#error").append("<ul><li>"+field+"</li></ul>");
          $("#message-error").fadeIn();
          if (data.status == 422) {
             console.clear();
          }
        });
   }

 });

});
//CUANDO ABRES LA VENTANA MODAL
$("#myModalCreateUser").on("shown.bs.modal",function() {
  $("#name").focus();
});
$("#myModalEditUser").on("shown.bs.modal",function() {
  $("#nam").focus();
});
//CUANDO CIERRAS LA VENTANA MODAL
$("#myModalEditUser").on("hidden.bs.modal", function () {
    $("#message-error").fadeOut()
});
$("#myModalCreateUser").on("hidden.bs.modal", function () {
    $("#message-errorCreate").fadeOut()
    $(this).find('form')[0].reset();
 		$("label.error").remove();
});
//-------------------------------------------
//eliminar registros
var Eliminar = function(id,name) {

  $.alertable.confirm("<span style='color:#000'>¿Está seguro de eliminar el Usuario?</span>"+"<strong><span style='color:#ff0000'>"+ name+"</span></strong>").then(function() {

      var route = "/usuario/"+id+"";
      var token = $("#token").val();

      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(data){
        if (data.success == 'true')
        {
          listUser();
          $("#message-delete").fadeIn();
          $('#message-delete').show().delay(3000).fadeOut(1);
        }else {
          $("#message-delete-error").fadeIn();
          $('#message-delete-error').show().delay(3000).fadeOut(1);
        }
      }
      });


    });

}
