$(document).ready(function() {
  $(".datepicker").datepicker({
    format: 'yyyy/m/d',
    language: "es",
    autoclose: true
  });
  $(".datepicker2").datepicker({
    format: 'yyyy/m/d',
    language: "es",
    autoclose: true
  });


   $("#mostrarLista").change(function() {
        if ($(this).val() == 'tipoContacto') {
          $("#tipoC").show();
        }else {
         $("#tipoC").hide();
        }
        if ($(this).val() == 'pendientes') {
          $("#penC").show();
          $("#penA").show();
        }else {
         $("#penC").hide();
         $("#penA").hide();
        }
        if ($(this).val() == 'cobros') {
          $("#cobraC").show();
          $("#cobraD").show();
        }else {
         $("#cobraC").hide();
         $("#cobraD").hide();
        }
        if ($(this).val() == 'xFecha') {
          $("#cobraF").show();

        }else {
         $("#cobraF").hide();
        }
        if ($(this).val() == 'tiempoDeS') {
          $("#tiempSol").show();

        }else {
         $("#tiempSol").hide();
        }
   });
});




$("#Tables1").DataTable({
 responsive: true,
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
 initComplete: function () {
        var r = $('#Tables1 tfoot tr');
        r.find('th').each(function(){
            $(this).css('padding', 8);
           });
          $('#Tables1 thead').append(r);
            $('#search_0').css('text-align', 'center');
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );

                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        },
 language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
      }
});
$("#Tables2").DataTable({
 responsive: true,
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
 "columnDefs": [
           { "visible": false, "targets": 0 }
       ],
       "order": [[ 0, 'asc' ]],
       "displayLength": 10,
       "drawCallback": function ( settings ) {
           var api = this.api();
           var rows = api.rows( {page:'current'} ).nodes();
           var last=null;

           api.column(0, {page:'current'} ).data().each( function ( group, i ) {
               if ( last !== group ) {
                   $(rows).eq( i ).before(
                       '<tr class="group"><td colspan="5" class="text-left">'+group+'</td></tr>'
                   );

                   last = group;
               }
           } );
       },
 language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    }
});
$('#Tables2 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    });
//---
$("#Tables3").DataTable({
 responsive: true,
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
 "columnDefs": [
           { "visible": false, "targets": 0 }
       ],
       "order": [[ 0, 'asc' ]],
       "displayLength": 10,
       "drawCallback": function ( settings ) {
           var api = this.api();
           var rows = api.rows( {page:'current'} ).nodes();
           var last=null;

           api.column(0, {page:'current'} ).data().each( function ( group, i ) {
               if ( last !== group ) {
                   $(rows).eq( i ).before(
                       '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                   );

                   last = group;
               }
           } );
       },
 language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    }
});

$('#Tables3 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    });
//------------
$("#Tables4").DataTable({
 responsive: true,
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
 "columnDefs": [
           { "visible": false, "targets": 0 }
       ],
       "order": [[ 0, 'asc' ]],
       "displayLength": 10,
       "drawCallback": function ( settings ) {
           var api = this.api();
           var rows = api.rows( {page:'current'} ).nodes();
           var last=null;

           api.column(0, {page:'current'} ).data().each( function ( group, i ) {
               if ( last !== group ) {
                   $(rows).eq( i ).before(
                       '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                   );

                   last = group;
               }
           } );
       },
 "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var intVal = function ( e ) {
                return typeof e === 'string' ?
                    e.replace(/[\$,]/g, '')*1 :
                    typeof e === 'number' ?
                        e : 0;
            };
    tota = api
    .column( 3 )
    .data()
    .reduce( function (c, d) {
                    return intVal(c) + intVal(d);
                }, 0 );
      pageTota = api
      .column( 3, { page: 'current'} )
      .data()
      .reduce( function (c, d) {
                    return intVal(c) + intVal(d);
                }, 0 );


            $( api.column( 3 ).footer() ).html('$'+pageTota +' ( $'+ tota +' total)');
        },
 language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    }
});
$('#Tables4 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    });
//-------
var tables = $("#Tables5").DataTable({
 responsive: true,
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
 "columnDefs": [
           { "visible": false, "targets": 0 }
       ],
       "order": [[ 0, 'asc' ]],
       "displayLength": 10,
       "drawCallback": function ( settings ) {
           var api = this.api();
           var rows = api.rows( {page:'current'} ).nodes();
           var last=null;

           api.column(0, {page:'current'} ).data().each( function ( group, i ) {
               if ( last !== group ) {
                   $(rows).eq( i ).before(
                       '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                   );

                   last = group;
               }
           } );
       },
 "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
    total = api
    .column( 3 )
    .data()
    .reduce(function(a, b){
                    return intVal(a) + intVal(b);
                },0);
      pageTotal = api
      .column( 3, { page: 'current'} )
      .data()
      .reduce(function (a, b) {
                    return intVal(a) + intVal(b);
                },0 );


            $( api.column( 3 ).footer() ).html('$'+pageTotal +' ( $'+ total +' total)');
        },
 language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    }
});

$('#Tables5 tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    });
//------------
$("#Tables6").DataTable({
 responsive: true,
  "bFilter": false,
  dom: 'Bfrtip',
         buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print'
         ],
 language: {
        "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    }
});
$("#Tables7").DataTable({
 responsive: true,
 dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
 language: {
      "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
    }
});


$('#fecha1').on('change', function(){
		var desde = $('#fecha1').val();
		var hasta = $('#fecha2').val();
    var token= $("#token").val();
    var tablaDatos = $("#datos");
		var url = "/cobrado";
    var vacio = 'No hay Registros';
    $("#datos").empty();
    $.ajax({
    headers: {'X-CSRF-TOKEN': token},
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
          $(datos).each(function(key,value){
            tablaDatos.append("<tr><td class='text-center'>"+value.fecha+"</td><td class='text-center'>$"+value.total+"</td></tr>");
          });
		}
  });
});
$('#fecha2').on('change', function(){
  		var desde = $('#fecha1').val();
  		var hasta = $('#fecha2').val();
      var token= $("#token").val();
      var tablaDatos = $("#datos");
      var vacio = 'No hay Registros';
  		var url = "/cobrado";
      $("#datos").empty();
      $.ajax({
      headers: {'X-CSRF-TOKEN': token},
  		type:'POST',
  		url:url,
  		data:'desde='+desde+'&hasta='+hasta,
  		success: function(datos){
            $(datos).each(function(key,value){
              tablaDatos.append("<tr><td class='text-center'>"+value.fecha+"</td><td class='text-center'>$"+value.total+"</td></tr>");
            });
  		}
    });
  	});
