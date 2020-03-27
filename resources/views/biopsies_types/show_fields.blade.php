<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Nombre:') !!}
    <p>{!! $biopsiesTypes->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de Creación:') !!}
    <p>{!! \Carbon\Carbon::parse($biopsiesTypes->created_at)->format('d/m/Y') !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Fecha de Actualización:') !!}
    <p>{!! \Carbon\Carbon::parse($biopsiesTypes->updated_at)->format('d/m/Y') !!}</p>
</div>

