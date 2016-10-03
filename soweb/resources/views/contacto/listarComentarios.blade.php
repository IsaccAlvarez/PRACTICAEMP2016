<table class="table table-responsive" style="font-size: 10pt;">
  <tbody id="dato">
    <tr>
      @foreach($comentarios as $comentario)
        <td>{{$comentario->user->name}}</td>
        <td>{{$comentario->created_at->format('dd-mm-yy  h:i:s A')}}</td>
        <td>{{$comentario->comentario}}</td>
      @endforeach
    </tr>
  </tbody>
</table>
