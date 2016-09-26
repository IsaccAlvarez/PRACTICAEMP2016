$(document).ready(function(){
listContacto();



 });
//mostrar y ocultar div
function mostrasDiv() {
  if (document.fContacto.esEmpresa[0].checked == true) {
     document.getElementById('nomJud').style.display='block';
}
 else {
     document.getElementById('nomJud').style.display='none';
  }
}
//--------------------------------------------------------------
//funcion de guardar
$("#guarda").click(function() {
     var nombr = $("#nombr").val();
     var esEmpres = $("input:radio[name=esEmpresa]").val();
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
     var iAsC = $("#iac").val();
     iAsUltMod = $("#iaumd").val();
console.log(nombr);
     var route = '/contacto';
     var token = $("#token").val();
var datos = "nombre="+nombr+"&esEmpresa="+esEmpres+"&nombreJuridico="+nombreJur+"&nombreRepresentante="+noRepre+
            "&telefono="+telefon+"&email="+correo+"&direccion="+dire+"&telCobro="+teCobro+"&emailCobro="+emCobro+
            "&personaCobra="+peCobro+"&tipoContacto="+tipoC+"&estado="+estado+"&idAsesorCreador="+iAsC+"&idAsesorUltimaModificacion="+iAsUltMod;
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
              $("#errors").append("<ul><li>"+field+"</li></ul>");
              $("#message-errors").fadeIn();
              if (data.status == 422) {
                 console.clear();
              }
            });
          }
     });
});
//-------------------------------------------------------------------------------------------------
//listar
 function listContacto() {
   var tablaDatos = $("#datos");
 	var route = "http://localhost:8000/contacto";

 	$("#datos").empty();
 	$.get(route, function(res){
 		$(res).each(function(key,value){
 			tablaDatos.append("<tr><td>"+value.idContacto+"</td><td>"+value.nombre+"</td><td>"+value.telefono+"</td><td>"+value.email+"</td><td>"+value.tipoContacto+"</td><td><button value="+value.idContacto+" OnClick='Mostrar(this);' class='btn btn-primary glyphicon glyphicon-pencil ' data-toggle='modal' data-target='#myModal'>Editar</button><button class='btn btn-danger glyphicon glyphicon-remove' value="+value.idContacto+" OnClick='Eliminar(this);'>Eliminar</button></td></tr>");
 		});
 	});

}

Mostrar = function(btn) {
  var route = "http://localhost:8000/contacto/"+btn.value+"/edit";
  $.get(route, function(data){

    $("#idContacto").val(data.idContacto);
    $("#nomb").val(data.nombre);
    $("input:radio[name=esEmpresa]").val(data.esEmpresa);
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


  });
}

//----------------------------------------------------------------------
//atualizar
$("#actualizar").click(function() {
  var id = $("#idContacto").val();
  var nombre = $("#nomb").val();
  var esEM = $("input:radio[name=esEmpresa]").val();
  var nJ = $("#nombJuri").val();
  var nR = $("#nomRepres").val();
  var telf = $("#telefe").val();
  var em = $("#email").val();
  var dir = $("#direcc").val()
  var tC = $("#teCobr").val();
  var eC = $("#correoC").val();
  var pC = $("#persCobr").val();
  var tC = $("#tipoC").val();
  var est = $("#est").val();
  var iAsUltM = $("#iaum").val();
console.log(id);
  var route = "/contacto/"+id+"";

  var token = $("#token").val();

  var datosUpdate = "nombre="+nombre+"&esEmpresa="+esEM+"&nombreJuridico="+nJ+"&nombreRepresentante="+nR+
              "&telefono="+telf+"&email="+em+"&direccion="+dir+"&telCobro="+tC+"&emailCobro="+eC+
              "&personaCobra="+pC+"&tipoContacto="+tC+"&estado="+est+"&idAsesorUltimaModificacion="+iAsUltM;
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
                       $("#error").append("<ul><li>"+field+"</li></ul>");
                       $("#message-error").fadeIn();
                       if (data.status == 422) {
                          console.clear();
                       }
                     });
                }
              });
});


//CUANDO CIERRAS LA VENTANA MODAL
$("#myModal").on("hidden.bs.modal", function () {
    $("#message-error").fadeOut()
});
$("#myModalCreateContacto").on("hidden.bs.modal", function () {
    $("#message-errors").fadeOut()
    $(this).find('form')[0].reset();
 		$("label.error").remove();
});




//eliminar
var Eliminar = function(idContacto) {

  $.alertable.confirm("<span style='color:#000'>¿Está seguro de eliminar el Contacto?</span>").then(function() {

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
