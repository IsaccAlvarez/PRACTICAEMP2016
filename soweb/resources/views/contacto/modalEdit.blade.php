<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Contacto</h4>
      </div>
      <div class="modal-body  ">
        <div class="modal-body">
          <div id='message-errors' class="alert alert-danger danger" role='alert' style="display: none">
          <strong id="errors"></strong>
          <div id="message-coment" class="alert alert-success alert-dismissible glyphicon glyphicon-saved" role="alert" style="display:none">
                  <strong> La información de guardó correctamente.</strong>
          </div>
         </div>

        <input type="hidden" name="idContacto" id="idContacto">
        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
        @include('contacto.forms.edit')
        <div id="coment" class="" style="display:none">
          <fieldset>
            <legend>Comentarios</legend>
              <div id="comentarios">
                {{-- <ul class="list-group" style="font-size: 10pt;">
                       @foreach ($comentarios as $comentario)
                       <li class="list-group-item">
                           <span class="label label-info">{{ $comentario->user->name }} {{$comentario->created_at
                           ->format('dd-mm-yy  h:i:s A')}}</span>
                           {{ $comentario->cometario }}
                       </li>
                       @endforeach
                   </ul>
                   {!! $comentarios->render() !!}
              </div> --}}
          </fieldset>
          {!!Form::open(['class'=>"form"])!!}
          <input type="hidden" name="idContacto" id="idContacto2">
          <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
          <div class="form-group">
            {!!Form::text('comentario',null,['class'=>'form-control', 'id'=>'comentar'])!!}
          </div>
           <button type="submit" id="grabar" class="btn btn-success" name="agregar">Guardar Comentario</button>
           <input type="hidden" name="idUser" id="idUs" value="{!!Auth::user()->id!!}">
          {!!Form::close()!!}
        </div>

      </div>
      <div class="modal-footer ">
        {!!link_to('#', $title=' Actualizar', $attributes = ['id'=>'actualizar', 'class'=>'btn btn-success glyphicon glyphicon-save'], $secure = null)!!}
      </div>
    </div>

  </div>
</div>
