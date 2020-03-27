<div class="col-sm-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', $accountingBank->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Account Number Field -->
    <div class="form-group">
        {!! Form::label('account_number', 'Nro. de Cuenta:') !!}
        {!! Form::text('account_number', $accountingBank->account_number, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Created By Field -->
    <div class="form-group">
        {!! Form::label('created_by', 'Creado por:') !!}
        {!! Form::text('created_by', $accountingBank->creator->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated By Field -->
    <div class="form-group">
        {!! Form::label('updated_by', 'Actualizado por:') !!}
        {!! Form::text('updated_by', $accountingBank->editor->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Fecha de Creación:') !!}
        {!! Form::text('created_at', \Carbon\Carbon::parse($accountingBank->created_at)->format('d/m/Y H:i'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Fecha de actualización:') !!}
        {!! Form::text('updated_at', \Carbon\Carbon::parse($accountingBank->updated_at)->format('d/m/Y H:i'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


