$(document).ready(function () {
  $("#mostrarLista").change(function() {
       if ($(this).val() == 'pXm') {
         $("#pendXMes").show();
       }else {
        $("#pendXMes").hide();
       }
       if ($(this).val() == 'gXm') {
         $("#rendXMes").show();
       }else {
        $("#rendXMes").hide();
       }
       if ($(this).val() == 'aXm') {
         $("#rXA").show();
       }else {
        $("#rXA").hide();
       }
       if ($(this).val() == 'rXm') {
         $("#rend").show();
       }else {
        $("#rend").hide();
       }

  });
});

function cambiar_fecha_grafica(){

    var anio_sel=$("#anio_sel").val();
    var mes_sel=$("#mes_sel").val();

    cargar_grafica_barras(anio_sel,mes_sel);



}
function cambiar_fecha(){

    var anio_s=$("#anio_s").val();
    var mes_s=$("#mes_s").val();


      cargar_grafica(anio_s,mes_s);


}
//------------------------------------------------------
function cargar_grafica_barras(anio,mes){
var options={
	 chart: {
	 	    renderTo: 'div_grafica_barras',
            type: 'column'
        },
        title: {
            text: 'Solicitudes Pendientes en el Mes'
        },
        subtitle: {
            text: 'Source: Soweb.seesoft-cr.com'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'PENDIENTES AL DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Pendientes',
            data: []

        }]
}

$("#div_grafica_barras").html();
var url = "listaPendiente/"+anio+"/"+mes+"";
$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
	for(i=1;i<=totaldias;i++){
	options.series[0].data.push( registrosdia[i] );
	options.xAxis.categories.push(i);
	}
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);
})
}
//-------------------------------------------------------------------------------------
function cargar_grafica(anio,mes){
var options={
	 chart: {
	 	    renderTo: 'div_grafica',
            type: 'column'
        },
        title: {
            text: 'Rendimineto General en el Mes'
        },
        subtitle: {
            text: 'Source: Soweb.seesoft-cr.com'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'CERRADAS AL DIA'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Cerradas',
            data: []

        }]
}

$("#div_grafica").html();
var urls = "rendimientoGeneral/"+anio+"/"+mes+"";
$.get(urls,function(result){
var dato= jQuery.parseJSON(result);
var total=dato.totald;
var registros=dato.registrosdia;
var e=0;
	for(e=1;e<=total;e++){
	options.series[0].data.push( registros[e] );
	options.xAxis.categories.push(e);
	}
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);
})
}
