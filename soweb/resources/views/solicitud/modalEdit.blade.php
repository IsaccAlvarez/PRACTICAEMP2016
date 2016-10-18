<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Solicitud</h4>
      </div>
      <div class="modal-body  ">
        <div class="modal-body">
          <div id='message-errors' class="alert alert-danger danger" role='alert' style="display: none">
          <strong id="errors"></strong>
         </div>

        <input type="hidden" name="idSolicitud" id="idSolicitud">
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        @include('solicitud.forms.edit')

        </div>

      </div>
      <div class="modal-footer ">
        {!!link_to('#', $title=' Guardar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-success glyphicon glyphicon-save'], $secure = null)!!}
      </div>
    </div>

  </div>
</div>
