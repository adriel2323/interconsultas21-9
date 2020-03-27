<!-- Template Category Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('template_category_id', 'Categoría de plantilla:') !!}
    {!! Form::select('template_category_id',\App\Models\pathologicalAnatomy\PathologicalAnatomyTemplatesTitles::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la categoría principal']) !!}
</div>

<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Código:') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Plantilla:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pathologicalAnatomyTemplates.index') !!}" class="btn btn-warning">Cancelar</a>
</div>
