<div class="form-group col-sm-6">
    {!! Form::label('show_until', 'Mostrar publicación hasta: ') !!}
    <input type="date" name="show_until" id="show_until" class="form-control" value="{{ \Carbon\Carbon::now()->addWeek()->format('Y-m-d') }}" />
</div>

<!-- Image Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_url', 'URL de la imagen:') !!}
    {!! Form::text('image_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Título:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Short Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('short_description', 'Descripción corta:') !!}
    {!! Form::textarea('short_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Extended Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('extended_description', 'Descripcion extendida:') !!}
    {!! Form::textarea('extended_description', null, ['class' => 'form-control', 'id' => 'extended_description']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="button" onclick="createSomeNews();" class="btn btn-success">Guardar</button>
    <a href="{!! route('webNews.index') !!}" class="btn btn-warning">Cancelar</a>
</div>
