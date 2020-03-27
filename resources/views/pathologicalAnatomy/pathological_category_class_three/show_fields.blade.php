<div class="col-sm-6">
    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'ID:') !!}
        {!! Form::text('id', $pathologicalCategoryClassThree->id, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Code Field -->
    <div class="form-group">
        {!! Form::label('code', 'Código:') !!}
        {!! Form::text('code', $pathologicalCategoryClassThree->code, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', $pathologicalCategoryClassThree->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Parent Category Field -->
    <div class="form-group">
        {!! Form::label('parentCategory', 'Categoría padre:') !!}
        {!! Form::text('parentCategory', $pathologicalCategoryClassThree->parentCategory->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


