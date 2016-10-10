$(document).ready(function(){
listContacto();

 });


//mostrar y ocultar div
function mostrasDiv() {
  if (document.fContacto.esEmpresas[1].checked == true) {
     document.getElementById('nomJud').style.display='block';
     document.getElementById('nRep').style.display='block';
}
 else {
     document.getElementById('nomJud').style.display='none';
     document.getElementById('nRep').style.display='none';
  }
}

//--------------------------------------------------------------
//funcion de guardar
$("#guarda").click(function() {
     var nombr = $("#nombr").val();
     var esEmpres = $("input:radio[name=esEmpresas]:checked").val();
     var nombreJur = $("#nomJurid").val();
     var noRepre = $("#nomRepre").val();
     var telefon = $("#telef").val();
     var correo = $("#correo").val();
     var dire = $("#direc").val();
     var teCobro = $("#tCobro").val();
     var emCobro = $("#eCobro").val();
     var peCobro = $("#perCob").val();
     var tipoC = $("#tCont").val();
     var estado = $("#estd").val();
     var iUsC = $("#iac").val();
     var iUsUltMod = $("#iaumd").val();
     var route = '/contacto';
     var token = $("#token").val();
var datos = "nombre="+nombr+"&esEmpresa="+esEmpres+"&nombreJuridico="+nombreJur+"&nombreRepresentante="+noRepre+
            "&telefono="+telefon+"&email="+correo+"&direccion="+dire+"&telCobro="+teCobro+"&emailCobro="+emCobro+
            "&personaCobra="+peCobro+"&tipoContacto="+tipoC+"&estado="+estado+"&idUser="+iUsC+"&userUltimaModificacion="+iUsUltMod;
     $.ajax({
           url: route,
           headers: {'X-CSRF-TOKEN': token},
           type: 'POST',
           dataType: 'json',
            data:datos,
          success:function(data){
            if (data.success == 'true') {
              listContacto();

              $("#myModalCreateContacto").modal('toggle');
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
//-------------------------------------------------------------------------------------------------
//listar
 function listContacto() {
   $.ajax({
     type:'get',
     url:'listAll',
     success: function(data){
       $("#listaC").empty().html(data);
     }

   });

}

Mostrar = function(idContacto) {
  var route = "/contacto/"+idContacto+"/edit";


  $.get(route, function(data){
    if (data.esEmpresa == 1) {
      document.getElementById('esEmpr2').checked = true;
      $("#radio").show();
      $("#rad").show();
    }else {
      document.getElementById('esEmpr1').checked = true;
      $("#radio").hide();
      $("#rad").hide();
  }
    $("#idContacto").val(data.idContacto);
    $("#nomb").val(data.nombre);
    $("#nombJuri").val(data.nombreJuridico);
    $("#nomRepres").val(data.nombreRepresentante);
    $("#telefe").val(data.telefono);
    $("#email").val(data.email);
    $("#direcc").val(data.direccion);
    $("#teCobr").val(data.telCobro);
    $("#correoC").val(data.emailCobro);
    $("#persCobr").val(data.personaCobra);
    $("#tipoC").val(data.tipoContacto);
    $("#est").val(data.estado);
    $("#idContacto2").val(data.idContacto);


  });
}
//----------------------------------------------------------------------

//----------------------------------------------------------------------
//atualizar
$("#actualizar").click(function() {
  var id = $("#idContacto").val();
  var nombre = $("#nomb").val();
  var esEM = $("input:radio[name=esEmpres]:checked").val();
  var nJ = $("#nombJuri").val();
  var nR = $("#nomRepres").val();
  var telf = $("#telefe").val();
  var em = $("#email").val();
  var dir = $("#direcc").val()
  var teC = $("#teCobr").val();
  var eC = $("#correoC").val();
  var pC = $("#persCobr").val();
  var tC = $("#tipoC").val();
  var est = $("#est").val();
  var iUsUltM = $("#iaum").val();

  var route = "/contacto/"+id+"";

  var token = $("#token").val();

  var datosUpdate = "nombre="+nombre+"&esEmpresa="+esEM+"&nombreJuridico="+nJ+"&nombreRepresentante="+nR+
              "&telefono="+telf+"&email="+em+"&direccion="+dir+"&telCobro="+teC+"&emailCobro="+eC+
              "&personaCobra="+pC+"&tipoContacto="+tC+"&estado="+est+"&userUltimaModificacion="+iUsUltM;
    $.ajax({
          url: route,
          headers: {'X-CSRF-TOKEN': token},
          type : 'PUT',
          dataType: 'json',
          data:datosUpdate,
          success: function(data){
                   if (data.success == 'true')
                    {
                         listContacto();
                         $("#myModal").modal('toggle');
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
                          // console.clear();
                       }
                     });
                }
              });
});

//CUANDO ABRES LA VENTANA MODAL
$("#myModalCreateContacto").on("shown.bs.modal",function() {
  $("#nombr").focus();
   $("#nomJud").hide();
   $("#nRep").hide();
});
$("#myModal").on("shown.bs.modal",function() {
   $("#nomb").focus();
   $("input:radio[name=esEmpres]").click(function() {
     if ($(this).attr("value")==1) {
       $("#radio").show();
       $("#rad").show();
     }else {
       $("#radio").hide();
       $("#rad").hide();
     }
   });
});
//CUANDO CIERRAS LA VENTANA MODAL
$("#myModal").on("hidden.bs.modal", function () {
    $("#message-errors").fadeOut()

});
$("#myModalCreateContacto").on("hidden.bs.modal", function () {
    $("#message-errorCreate").fadeOut()
    $(this).find('form')[0].reset();
 		$("label.error").remove();
});
//eliminar
var Eliminar = function(idContacto, nombre) {

  $.alertable.confirm("<span style='color:#000'>¿Está seguro de eliminar el Contacto?</span>"+"<strong><span style='color:#ff0000'>"+ nombre+"</span></strong>").then(function() {

      var route = "/contacto/"+idContacto+"";
      var token = $("#token").val();

      $.ajax({
        url: route,
        headers: {'X-CSRF-TOKEN': token},
        type: 'DELETE',
        dataType: 'json',
        success: function(data){
        if (data.success == 'true')
        {
          listContacto();
          $("#message-delete").fadeIn();
          $('#message-delete').show().delay(3000).fadeOut(1);
        }
      }
      });
    });
}
//-------------------------------------
//----------   Comentarios   ---------
//-------------------------------------
