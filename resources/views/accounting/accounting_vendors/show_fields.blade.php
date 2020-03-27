<div class="col-sm-6">
    <!-- Cuit Field -->
    <div class="form-group">
        {!! Form::label('cuit', 'Cuit:') !!}
        {!! Form::text('cuit', $accountingVendor->cuit, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Fantasy Name Field -->
    <div class="form-group">
        {!! Form::label('fantasy_name', 'Nombre de fantasía:') !!}
        {!! Form::text('fantasy_name', $accountingVendor->fantasy_name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Pay Name Field -->
    <div class="form-group">
        {!! Form::label('pay_name', 'Nombre en el cheque:') !!}
        {!! Form::text('pay_name', $accountingVendor->pay_name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Address Field -->
    <div class="form-group">
        {!! Form::label('address', 'Dirección:') !!}
        {!! Form::text('address', $accountingVendor->address, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Fecha de creación:') !!}
        {!! Form::text('created_at', \Carbon\Carbon::parse($accountingVendor->created_at)->format('d/m/Y H:i'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Created By Field -->
    <div class="form-group">
        {!! Form::label('created_by', 'Creado por:') !!}
        {!! Form::text('created_by', $accountingVendor->creator->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

<div class="col-sm-6">
    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Fecha de actualización:') !!}
        {!! Form::text('updated_at', \Carbon\Carbon::parse($accountingVendor->updated_at)->format('d/m/Y H:i'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated By Field -->
    <div class="form-group">
        {!! Form::label('updated_by', 'Actualizado por:') !!}
        {!! Form::text('updated_by', $accountingVendor->editor->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>








