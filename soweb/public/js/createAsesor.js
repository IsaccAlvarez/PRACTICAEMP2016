$("#guardar").click(function(){
  var nombre = $("#nomb").val();
  var inic = $("#ini").val();
  var telef = $("#telef").val();
  var ePersonal = $("#correoP").val();
  var eEmpresa = $("#correoE").val();
  var estd = $("#estado").val();
  var fecIngre = $("#fechaI").val();
  var fcreac = $("#fCreacion").val();
  var fUltMod = $("#fum").val();
  var iAsUltMod = $("#iaum").val();

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
              idAsesorUltimaModificacion: iAsUltMod},

        success:function(){

           $("#msj-success").fadeIn();
           alert('inserto');
           document.location.href='/asesor';
        },
        error:function(msj){
          $("#msj-error").fadeIn();
        }



   });

});
