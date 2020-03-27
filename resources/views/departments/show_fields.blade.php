<div class="col-sm-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', $department->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Fecha de creación:') !!}
        {!! Form::text('created_at', \Carbon\Carbon::parse($department->created_at)->format('d/m/Y H:i'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Fecha de actualización:') !!}
        {!! Form::text('updated_at', \Carbon\Carbon::parse($department->updated_at)->format('d/m/Y H:i'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Created By Field -->
    <div class="form-group">
        {!! Form::label('created_by', 'Creado por:') !!}
        {!! Form::text('created_by', $department->creator->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated By Field -->
    <div class="form-group">
        {!! Form::label('updated_by', 'Editado por:') !!}
        {!! Form::text('updated_by', $department->editor->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


