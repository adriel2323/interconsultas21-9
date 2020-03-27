<!-- Code Field -->
<div class="form-group col-sm-6">
    {!! Form::label('code', 'Código:') !!}
    {!! Form::number('code', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre de Categoría:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Parent Category -->
<div class="form-group col-sm-6">
    {!! Form::label('pathology_category_class_one_id', 'Categoría Principal de Nivel I:') !!}
    {!! Form::select('pathology_category_class_one_id', \App\Models\pathologicalAnatomy\PathologicalCategoryClassOne::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la categoría principal', 'onchange' => 'bringSecondLevelCategories();']) !!}
</div>

<div class="form-group col-sm-6" id="secondLevelCategoriesSelect"></div>

<div class="form-group col-sm-6" id="thirdLevelCategoriesSelect"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pathologicalCategoryClassFour.index') !!}" class="btn btn-warning">Cancelar</a>
</div>
