$(document).ready(function() {
list();
});

var list = function() {
  $.ajax({
    type:'get',
    url:'listaPendientes',
    success: function(data){
      $("#listPen").empty().html(data);
    }
  });
}
