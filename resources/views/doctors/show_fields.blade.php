<!-- License Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license', 'Matrícula:') !!}
    {!! Form::text('license', $doctor->license, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Cuit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuit', 'Cuit:') !!}
    {!! Form::text('cuit', $doctor->cuit, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Servicio:') !!}
    {!! Form::select('service_id', \App\Models\Service::all()->pluck('name','id'), $doctor->service_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción', 'disabled']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Teléfono:') !!}
    {!! Form::text('phone', $doctor->phone, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Dirección:') !!}
    {!! Form::text('address', $doctor->address, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Malpractice Ensurance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('malpractice_ensurance', 'Seguro de mala práxis:') !!}
    {!! Form::text('malpractice_ensurance', $doctor->malpractice_ensurance, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Usuario para acceder al sistema:') !!}
    {!! Form::select('user_id', \App\Models\Users::all()->pluck('name','id'), $doctor->user_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción', 'disabled']) !!}

</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre y Apellido:') !!}
    {!! Form::text('name', $doctor->name, ['class' => 'form-control','disabled']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', $doctor->email, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    {!! Form::text('created_at', $doctor->created_at, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Fecha de actualización:') !!}
    {!! Form::text('updated_at', $doctor->updated_at, ['class' => 'form-control', 'disabled']) !!}
</div>