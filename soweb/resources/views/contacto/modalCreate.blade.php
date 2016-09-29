<div class="modal fade" id="myModalCreateContacto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuevo Contacto</h4>
      </div>
      <div class="modal-body  ">
        <div class="modal-body">
          <div id='message-errorCreate' class="alert alert-danger danger" role='alert' style="display: none">
          <strong id="errorCreate"></strong>
         </div>


        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        @include('contacto.forms.create')
        

      </div>
      <div class="modal-footer ">
        {!!link_to('#', $title=' Guardar', $attributes = ['id'=>'guarda', 'class'=>'btn btn-success glyphicon glyphicon-save'], $secure = null)!!}
      </div>

    </div>
  </div>
</div>
