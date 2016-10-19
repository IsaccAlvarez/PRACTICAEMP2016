$(document).ready(function(){
listAsesor();



});

 //---------------------------------------------------------------
 window.setTimeout(function() {
    $(".alertEmail").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
 }, 4000);
 //listar los registros guardados
var listAsesor = function() {
  $.ajax({
    type:'get',
    url:'listall',
    success: function(data){
      $("#lista").empty().html(data);
    }
  });
}
//----------------------------------------------------------------

//----------------------------------------------------------------
//funcionalidad de guardar
$("#guardar").click(function(){
  var nombre = $("#nombe").val();
  var inic = $("#inic").val();
  var telef = $("#telefe").val();
  var ePersonal = $("#correoPe").val();
  var eEmpresa = $("#correoEm").val();
  var estd = $("#estad").val();
  var fecIngre = $("#fechaIn").val();
  var idUser = $("#iU").val();
  var iUsUltMod = $("#iaumd").val();
  var route = "/asesor";

  var token = $("#token").val();

   $.ajax({
         url: route,
         headers: {'X-CSRF-TOKEN': token},
         type: 'POST',
         dataType: 'json',
         data:{nombre: nombre,
              iniciales: inic,
              telefono: telef,
              emailPersonal: ePersonal,
              emailEmpresa: eEmpresa,
              estado: estd,
              fechaIngreso: fecIngre,
              idUser:idUser,
              userUltimaModificacion: iUsUltMod},

        success:function(data){
          if (data.success == 'true') {
            listAsesor();
            $("#myModalCreate").modal('toggle');
            $("#message-save").fadeIn();
            $('#message-save').show().delay(3000).fadeOut(1);
          }
        },
        error:function(data){
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
//----------------------------------------------------------------
//mostrar el model con el form y los datos
var Mostrar = function(idAsesor)
{
  var route = "/asesor/"+idAsesor+"/edit";
  $.get(route, function(data){

    $("#idAsesor").val(data.idAsesor);
    $("#nomb").val(data.nombre);
    $("#ini").val(data.iniciales);
    $("#telef").val(data.telefono);
    $("#correoP").val(data.emailPersonal);
    $("#correoE").val(data.emailEmpresa);
    $("#estado").val(data.estado);
    $("#fechaI").val(data.fechaIngreso);

  });
}
//actualizar registros
$("#actualizar").click(function() {
  var id = $("#idAsesor").val();
  var nombre = $("#nomb").val();
  var inic = $("#ini").val();
  var telef = $("#telef").val();
  var ePersonal = $("#correoP").val();
  var eEmpresa = $("#correoE").val();
  var estd = $("#estado").val();
  var fecIngre = $("#fechaI").val();
  var iUsUltMod = $("#iaum").val();

  var route = "/asesor/"+id+"";

  var token = $("#token").val();

 $.ajax({
   url: route,
   headers: {'X-CSRF-TOKEN': token},
   type : 'PUT',
   dataType: 'json',
   data:{nombre: nombre,
        iniciales: inic,
        telefono: telef,
        emailPersonal: ePersonal,
        emailEmpresa: eEmpresa,
        estado: estd,
        fechaIngreso: fecIngre,
        userUltimaModificacion: iUsUltMod},
     success: function(data){
        if (data.success == 'true')
         {
            listAsesor();
            $("#myModal").modal('toggle');
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
$("#myModalCreate").on("shown.bs.modal",function() {
  $("#nombe").focus();
});
$("#myModal").on("shown.bs.modal",function() {
  $("#nomb").focus();
});
//CUANDO CIERRAS LA VENTANA MODAL
$("#myModal").on("hidden.bs.modal", function () {
    $("#message-error").fadeOut()
});
$("#myModalCreate").on("hidden.bs.modal", function () {
    $("#message-errors").fadeOut()
    $(this).find('form')[0].reset();
 		$("label.error").remove();
});
//-------------------------------------------
//eliminar registros
var Eliminar = function(idAsesor,nombre) {

  $.alertable.confirm("<span style='color:#000'>¿Está seguro de eliminar el Asesor?</span>"+"<strong><span style='color:#ff0000'>"+ nombre+"</span></strong>").then(function() {

      var route = "/asesor/"+idAsesor+"";
      var token = $("#token").val();

      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(data){
        if (data.success == 'true')
        {
          listAsesor();
          $("#message-delete").fadeIn();
          $('#message-delete').show().delay(3000).fadeOut(1);
        }
      }
      });


    });

}
//buscar asesor
function buscarAsesor() {
  var dato=$("#dato").val();
}
