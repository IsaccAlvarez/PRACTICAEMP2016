<div class="form-group">
    {!!Form::label('nombre','Nombre:')!!}
    {!!Form::text('nombre',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('inicales','Iniciales:')!!}
    {!!Form::text('inciales',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('tipoAsesor','Tipo de Asesor:')!!}
    {!!Form::text('tipoAsesor',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('telefono','Telefono:')!!}
    {!!Form::text('telefono',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('clave','Clave:')!!}
    {!!Form::password('clave',['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('clave','Clave:')!!}
    {!!Form::password('password_confirmation',['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('emailPersonal','Correo Personal:')!!}
    {!!Form::email('emailPersonal',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('emailEmpresa','Correo de Empresa:')!!}
    {!!Form::email('emailEmpresa',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!!Form::label('estatdo','Estado:')!!}
    {!!Form::text('email',null,['class'=>'form-control'])!!}
</div>