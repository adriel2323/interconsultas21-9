<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre y Apellido:') !!}
    <p>{!! $users->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $users->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de Alta:') !!}
    <p>{!! \Carbon\Carbon::parse($users->created_at)->format('d/m/Y') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Fecha de Actualización:') !!}
    <p>{!! \Carbon\Carbon::parse($users->updated_at)->format('d/m/Y') !!}</p>
</div>

