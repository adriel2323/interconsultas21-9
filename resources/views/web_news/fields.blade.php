<!-- Image Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', 'URL de la imagen:') !!}
    {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control balloonEditor']) !!}
</div>

<!-- Short Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('short_description', 'Descripción corta:') !!}
    {!! Form::text('short_description', null, ['class' => 'form-control balloonEditor']) !!}
</div>

<!-- Extended Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('extended_description', 'Descripcion extendida:') !!}
    {!! Form::textarea('extended_description', null, ['class' => 'form-control classicEditor']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('webNews.index') !!}" class="btn btn-warning">Cancelar</a>
</div>
