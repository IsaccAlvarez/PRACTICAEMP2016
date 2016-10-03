<ul class="list-group" style="font-size: 10pt;">
       @foreach ($comentarios as $comentario)
       <li class="list-group-item">
           <span class="label label-info">{{ $comentario->user->name }} {{$comentario->created_at
           ->format('dd-mm-yy  h:i:s A')}}</span>
           {{ $comentario->cometario }}
       </li>
       @endforeach
   </ul>
   {!! $comentarios->render() !!}
