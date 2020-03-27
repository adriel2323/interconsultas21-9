<div class="col-sm-6">
    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'ID:') !!}
        {!! Form::text('id', $pathologicalCategoryClassTwo->id, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Code Field -->
    <div class="form-group">
        {!! Form::label('code', 'Código:') !!}
        {!! Form::text('code', $pathologicalCategoryClassTwo->code, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', $pathologicalCategoryClassTwo->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Parent Category Field -->
    <div class="form-group">
        {!! Form::label('parentCategory', 'Categoría Padre:') !!}
        {!! Form::text('parentCategory', $pathologicalCategoryClassTwo->parentCategory->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


