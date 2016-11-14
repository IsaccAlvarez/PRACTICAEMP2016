$(document).ready(function() {
listSolicitud();
});
//---------------------
$(document).on("submit",".form",function(e) {
  e.preventDefault();
  listSolicitud();
  var title = $("#tSoli").val();
  var descrip = $("#descr").val();
  var fech = $("#fech").val();
  var idCont = $("#idContct").val();
  var idAse = $("#idAses").val();
  var idUse = $("#iac").val();
  var pContact = $("#pCont").val();
  var est = $("#estd").val();
  var tipoSol = $("#tipoSolic").val();
  var preciCotiza =$("#prCoti").val();
  var precioCobr = $("#pCobr").val();
  var usUlMo = $("#iaumd").val();
  var asesor = $("#ases").val();

  var token = $("#token").val();
  var route = '/solicitud';
  var datosString = "tituloSolicitud="+title+"&descripcion="+descrip+"&fecha="+fech+"&idContacto="+idCont+
                    "&idAsesor="+idAse+"&idUser="+idUse+"&personaContacto="+pContact+"&estado="+est+
                    "&tipoSolicitud="+tipoSol+"&precioCotizacion="+preciCotiza+"&precioCobrado="+precioCobr+
                    "&userUltimaModificacion="+usUlMo+"&asesor="+asesor;
  $.ajax({
   url: route,
   headers: {'X-CSRF-TOKEN': token},
   type: 'POST',
   dataType: 'json',
   data:datosString,
   beforeSend: function(){
       $("#guarda").val("Guardando...");
       $('#guarda').attr('disabled','disabled');
   },
   complete:function(data){
     $("#guarda").val("Guardar");
     $('#guarda').removeAttr('disabled');
   },
   success:function(data){

     if (data.success == 'true') {
       listSolicitud();
       $("#myModalCreateSolicitud").modal('toggle');
       $("#message-save").fadeIn();
       $('#message-save').show().delay(3000).fadeOut(1);
     }
   },
   error:function(data){
     $.each(data.responseJSON, function(i, field){
       $("#errorCreate").append("<ul><li>"+field+"</li></ul>");
       $("#message-errorCreate").fadeIn();
       if (data.status == 422) {
          console.clear();
       }
     });
   }
  });

});
//--------------------
window.setTimeout(function() {
  $(".alertEmail").fadeTo(500, 0).slideUp(500, function(){
      $(this).remove();
  });
}, 4000);

//-------------------------create--------------
var path = "/autocompleteC";
   $('input.typeahead').typeahead({
       source:  function (query, process) {
       return $.get(path, { query: query }, function (results) {
               return process(results);

           });
       },
        updater: function(item) {
              $("#idContct").val(item.idContacto);
              $("#pCont").val(item.nombreRepresentante);
              document.getElementById('tel').innerText= item.telefono;
              document.getElementById('ema').innerText = item.email;
              return item;
          }
      });

   var route = "/autocompleteA";
      $('input.asesores').typeahead({
          source:  function (query, process) {
          return $.get(route, { query: query }, function (data) {
                  return process(data);

              });
          },
          updater: function(item) {
                $("#idAses").val(item.idAsesor);
                return item;
            }

      });
//-------------------------edit--------------
var path = "/autocompleteC";
   $('input.typeaheadEdit').typeahead({
       source:  function (query, process) {
       return $.get(path, { query: query }, function (results) {
               return process(results);

           });
       },
        updater: function(item) {
              $("#idContac").val(item.idContacto);
              $("#perCont").val(item.nombreRepresentante);
              document.getElementById('t').innerText= item.telefono;
              document.getElementById('e').innerText = item.email;
              return item;
          }
      });

   var route = "/autocompleteA";
      $('input.asesoresEdit').typeahead({
          source:  function (query, process) {
          return $.get(route, { query: query }, function (data) {
                  return process(data);

              });
          },
          updater: function(item) {
                $("#idAsesor").val(item.idAsesor);
                return item;
            }

      });
//---------------------------------------------------------
var listSolicitud = function () {
  $.ajax({
    type:'get',
    url:'listSolit',
    success: function(data){
      $("#listSoli").empty().html(data);
    }
  });
}
//--------------------------------------------
var mostrarS = function(idSolicitud) {
 var route = "/solicitud/"+idSolicitud+"/edit";
 $.get(route, function(data) {

     $("#idSolicitud").val(data.idSolicitud);
     $("#search").val(data.contactos.nombre)
     document.getElementById('t').innerText= data.contactos.telefono;
     document.getElementById('e').innerText = data.contactos.email;
     $("#idContac").val(data.idContacto);
     $("#titSoli").val(data.tituloSolicitud);
     $("#aseso").val(data.asesores.nombre);
     $("#idAsesor").val(data.idAsesor);
     $("#perCont").val(data.personaContacto);
     $("#descripc").val(data.descripcion);
     $("#fecha").val(data.fecha);
     $("#tipSolicit").val(data.tipoSolicitud);
     $("#estad").val(data.estado);
     $("#preCoti").val(data.precioCotizacion);
     $("#prCobr").val(data.precioCobrado);
 });
}
//---------------------------------------------
$("#actualizar").click(function() {
  var id = $("#idSolicitud").val();
  var titleS = $("#titSoli").val();
  var descri = $("#descripc").val();
  var fecha = $("#fecha").val();
  var idContacto = $("#idContac").val();
  var idAsesor = $("#idAsesor").val();
  var perContact = $("#perCont").val();
  var estad = $("#estad").val();
  var tipoSolici = $("#tipSolicit").val();
  var precioCotiza =$("#preCoti").val();
  var precioCobra = $("#prCobr").val();
  var usUlMod = $("#iumd").val();

  var route ="/solicitud/"+id+"";
  var token = $("#token").val();

  var datosS = "tituloSolicitud="+titleS+"&descripcion="+descri+"&fecha="+fecha+"&idContacto="+idContacto+
                    "&idAsesor="+idAsesor+"&personaContacto="+perContact+"&estado="+estad+
                    "&tipoSolicitud="+tipoSolici+"&precioCotizacion="+precioCotiza+"&precioCobrado="+precioCobra+
                    "&userUltimaModificacion="+usUlMod;
 $.ajax({
   url: route,
   headers: {'X-CSRF-TOKEN': token},
   type : 'PUT',
   dataType: 'json',
   data:datosS,
     success: function(data){
        if (data.success == 'true')
         {
          listSolicitud();
          $("#myModalEdit").modal('toggle');
          $("#message-update").fadeIn();
          $('#message-update').show().delay(3000).fadeOut(1);
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
//cuando abres el modal
$("#myModalCreateSolicitud").on("shown.bs.modal",function() {
  $("#searchName").focus();
});
$("#myModalEdit").on("shown.bs.modal",function() {
  $("#search").focus();
});
//cuando cierras el modal
$("#myModalCreateSolicitud").on("hidden.bs.modal", function () {
    $("#message-errorCreate").fadeOut()
    $(this).find('form')[0].reset();
    document.getElementById('tel').innerText= 'Telefono';
    document.getElementById('ema').innerText = 'Correo';
 		$("label.error").remove();
});
$("#myModalEdit").on("hidden.bs.modal", function () {
    $("#message-errors").fadeOut()
    $(this).find('form')[0].reset();
 		$("label.error").remove();
});
