<div class="col-sm-12">
    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Nombre de la compañía:') !!}
        {!! Form::text('name', $insuranceCompanies->name, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Address Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('address', 'Dirección:') !!}
        {!! Form::text('address', $insuranceCompanies->address, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('phone', 'Teléfono:') !!}
        {!! Form::text('phone', $insuranceCompanies->phone, ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('created_at', 'Fecha de creación:') !!}
        {!! Form::text('created_at', \Carbon\Carbon::parse($insuranceCompanies->created_at)->format('d/m/Y'), ['class' => 'form-control', 'disabled']) !!}
    </div>

    <!-- Phone Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('updated_at', 'Fecha de actualización:') !!}
        {!! Form::text('updated_at', \Carbon\Carbon::parse($insuranceCompanies->updated_at)->format('d/m/Y'), ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>

