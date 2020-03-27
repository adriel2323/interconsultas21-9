<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $os->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de Creación:') !!}
    <p>{!! \Carbon\Carbon::parse($os->created_at)->format('d/m/Y') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Fecha de Actualización:') !!}
    <p>{!! \Carbon\Carbon::parse($os->updated_at)->format('d/m/Y') !!}</p>
</div>

