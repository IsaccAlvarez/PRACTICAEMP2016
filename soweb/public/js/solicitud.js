$(document).ready(function() {
listSolicitud();
});


var listSolicitud = function () {
  $.ajax({
    type:'get',
    url:'listSolit',
    success: function(data){
      $("#listSoli").empty().html(data);
    }
  });
}

$("#guardar").click(function () {
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

 var token = $("#token").val();
 var route = '/solicitud';
 var datosString = "tituloSolicitud="+title+"&descripcion="+descrip+"&fecha="+fech+"&idContacto="+idCont+
                   "&idAsesor="+idAse+"&idUser="+idUse+"&personaContacto="+pContact+"&estado="+est+
                   "&tipoSolicitud="+tipoSol+"&precioCotizacion="+preciCotiza+"&precioCobrado="+precioCobr+
                   "&userUltimaModificacion="+usUlMo;
$.ajax({
  url: route,
  headers: {'X-CSRF-TOKEN': token},
  type: 'POST',
  dataType: 'json',
  data:datos,
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
