@extends('layouts.admin')
@section('title','Informes')
{!!Html::style("http://flopreynat.com/blog/make-google-charts-responsive.html")!!}
@section('content')
  <div class="panel panel-primary">
    <div class="panel-heading">
      <b>INFORME POR GRAFICOS</b>
      <div class="  ">
        {!!Form::select('mostrar',[
          'pXm'=>'Pendientes por Mes',
          'aXm'=>'Rendimiento de Asesores por Mes',
          'gXm'=>'Rendimineto General por Mes ',
          'rXm'=>'Rendimiento General del Mes Actual'
        ],null,['class'=>'form-control','id'=>'mostrarLista','placeholder'=>'Selecione'])!!}
      </div>

    </div>

  </div>
  {{-- -------------------------------------------------------------------------------------- --}}
<div id="pendXMes" style="Display:none;" >
  <?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
 <div  class="row" >
 <div class="col-md-6">
                  <label>Año</label>
                  <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">
                  <?php  echo '<option value="'.$anio.'" >'.$anio.'</option>';   ?>
                    <option value="2015" >2015</option>
                    <option value="2016" >2016</option>
                    <option value="2017" >2017</option>
                    <option value="2018">2018</option>
                    <option value="2019" >2019</option>
                  </select>
 </div>
 <div class="col-md-6">
                  <label>Mes</label>
                  <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                  <?php  echo '<option value="'.$mes.'" >'.$nombremes[intval($mes)].'</option>';   ?>
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="5">MAYO</option>
                    <option value="6">JUNIO</option>
                    <option value="7">JULIO</option>
                    <option value="8">AGOSTO</option>
                    <option value="9">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>

                  </select>

 </div>
 </div>
 <div  class="" >
 <br/>
	<div class="box box-primary">
		<div class="box-header">
		</div>

		<div class="box-body" id="div_grafica_barras">
		</div>

	    <div class="box-footer">
		</div>
	</div>
 </div>

</div>
{{-- -------------------------------------------------------------------------------------- --}}
<div id="rendXMes" style="Display:none;">

  <?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>
  <div  class="row" >
  <div class="col-md-6">
                  <label>Año</label>
                  <select class="form-control" id="anio_s"  onchange="cambiar_fecha();">
                  <?php  echo '<option value="'.$anio.'" >'.$anio.'</option>';   ?>
                    <option value="2015" >2015</option>
                    <option value="2016" >2016</option>
                    <option value="2017" >2017</option>
                    <option value="2018">2018</option>
                    <option value="2019" >2019</option>
                  </select>
  </div>
  <div class="col-md-6">
                  <label>Mes</label>
                  <select class="form-control" id="mes_s" onchange="cambiar_fecha();" >
                  <?php  echo '<option value="'.$mes.'" >'.$nombremes[intval($mes)].'</option>';   ?>
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="5">MAYO</option>
                    <option value="6">JUNIO</option>
                    <option value="7">JULIO</option>
                    <option value="8">AGOSTO</option>
                    <option value="9">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>

                  </select>

  </div>
  </div>
  <div  class="" >
  <br/>
  <div class="box box-primary">
    <div class="box-header">
    </div>

    <div class="box-body" id="div_grafica">
    </div>

      <div class="box-footer">
    </div>
  </div>
  </div>

</div>
{{-- -------------------------------------------------------------------------------------- --}}
<div  id="rXA" class="col-md-6"style="Display:none;">
   <div class="chart" id="piechart" style="width: 900px; height: 500px;">
   </div>
</div>
{{-- -------------------------------------------------------------------------------------- --}}
<div  id="rend" class="col-md-6" style="Display:none;">

   <div class="chart" id="piechart2" style="width: 900px; height: 500px;">
   </div>
</div>
@endsection
@section('script')

  {!!Html::script('js/highcharts.js')!!}
  {!!Html::script('js/graficos.js')!!}
  {!!Html::script('https://www.gstatic.com/charts/loader.js')!!}


  <script type="text/javascript">
  $(window).resize(function(){
	  	drawChart();
	  	drawC();
	});
    cargar_grafica_barras(<?= $anio; ?>,<?= intval($mes); ?>);
    cargar_grafica(<?= $anio; ?>,<?= intval($mes); ?>);

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

function drawChart() {
         var data = google.visualization.arrayToDataTable([
           ['Solicitudes Cerradas', 'mes'],
             @foreach ($solicitudes as $p)
               ['{{ $p->asesores->nombre}}', {{ $p->total}}],
             @endforeach
         ]);
         var options = {
           title: 'Solicitudes Cerradas por Asesor en el Mes',

          is3D: true

         };
         var chart = new google.visualization.PieChart(document.getElementById('piechart'));
         chart.draw(data, options);
}
//---------------------------------
google.charts.setOnLoadCallback(drawC);
function drawC() {
  var data = google.visualization.arrayToDataTable([
        ['Tipo  Solicitud', 'Total'],
          @foreach ($rendimiento as $r)
            ['{{ $r->tipoSolicitud}}', {{ $r->totals}}],
              @endforeach
              ]);
  var options = {
        title: 'Rendimiento General por Tipo de Solicitud',

        is3D: true

            };
      var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
      chart.draw(data, options);
}

  </script>
@endsection
