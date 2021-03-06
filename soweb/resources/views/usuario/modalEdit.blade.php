<div class="modal fade" id="myModalEditUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Usuario</h4>
      </div>
      <div class="modal-body">
        <div id='message-error' class="alert alert-danger danger" role='alert' style="display: none">
        <strong id="error"></strong>
       </div>
        @include('alerts.request')
        @include('alerts.errors')
      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      	<input type="hidden" name="id" id="id">
        @include('usuario.forms.edt')
        <div class="modal-footer">
        {!!link_to('#', $title=' Actualizar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-success glyphicon glyphicon-save'], $secure = null)!!}
        </div>
      </div>

    </div>
  </div>
</div>


  
