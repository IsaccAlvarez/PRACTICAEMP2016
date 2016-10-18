<div class="modal fade" id="myModalComentario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Comentario de Solicitud #{{$solicitud->idSolicitud}}</h4>
      </div>
      <div class="modal-body  ">
        <div class="modal-body">
          <div id="message-coment" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
                  <strong> La información de guardó correctamente.</strong>
          </div>
         </div>


          {!!Form::open(['class'=>"form"])!!}
          <input type="hidden" name="idSolicitud" id="idSolicitud" value="{{$solicitud->idSolicitud}}">
          <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
          <div class="form-group">
            {!!Form::label('Comentario')!!}
            {!!Form::textarea('comentario',null,['class'=>'form-control', 'size'=>'10x3','id'=>'comentari'])!!}
          </div>
           <input type="hidden" name="idUser" id="idUs" value="{!!Auth::user()->id!!}">
          {!!Form::close()!!}


      </div>
      <div class="modal-footer ">
        {!!link_to('#', $title=' Guardar', $attributes = ['id'=>'comentar', 'class'=>'btn btn-success glyphicon glyphicon-save'], $secure = null)!!}
      </div>
    </div>

  </div>
</div>
