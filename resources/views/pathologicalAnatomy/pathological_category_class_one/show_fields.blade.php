<div class="col-sm-6">
    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'ID:') !!}
        {!! Form::text('id', $pathologicalCategoryClassOne->id, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Code Field -->
    <div class="form-group">
        {!! Form::label('code', 'Código:') !!}
        {!! Form::text('code', $pathologicalCategoryClassOne->code, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', $pathologicalCategoryClassOne->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


