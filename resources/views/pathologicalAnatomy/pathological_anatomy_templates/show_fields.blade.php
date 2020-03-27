<div class="col-sm-6">
    <!-- Template Category Id Field -->
    <div class="form-group">
        {!! Form::label('template_category_id', 'Categoría principal de plantilla:') !!}
        {!! Form::text('template_category_id', $pathologicalAnatomyTemplate->template_category_id, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Code Field -->
    <div class="form-group">
        {!! Form::label('code', 'Código:') !!}
        {!! Form::text('code', $pathologicalAnatomyTemplate->code, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Fecha de creación:') !!}
        {!! Form::text('created_at', \Carbon\Carbon::parse($pathologicalAnatomyTemplate->created_at)->format('d/m/Y'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Fecha de actualización:') !!}
        {!! Form::text('updated_at', \Carbon\Carbon::parse($pathologicalAnatomyTemplate->updated_at)->format('d/m/Y'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Created By Field -->
    <div class="form-group">
        {!! Form::label('created_by', 'Creado por:') !!}
        {!! Form::text('created_by', $pathologicalAnatomyTemplate->creator->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated By Field -->
    <div class="form-group">
        {!! Form::label('updated_by', 'Actualizado por:') !!}
        {!! Form::text('updated_by', $pathologicalAnatomyTemplate->editor->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-12">
    <!-- Description Field -->
    <div class="form-group">
        {!! Form::label('description', 'Descripción:') !!}
        {!! Form::textarea('description', $pathologicalAnatomyTemplate->description, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

