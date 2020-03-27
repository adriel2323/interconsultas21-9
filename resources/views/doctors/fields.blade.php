<!-- License Field -->
<div class="form-group col-sm-6">
    {!! Form::label('license', 'Matrícula:') !!}
    {!! Form::text('license', null, ['class' => 'form-control']) !!}
</div>

<!-- Cuit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuit', 'Cuit:') !!}
    {!! Form::text('cuit', null, ['class' => 'form-control']) !!}
</div>

<!-- Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('service_id', 'Servicio:') !!}
    @if(isset($doctor))
        {!! Form::select('service_id', \App\Models\Service::all()->pluck('name','id'), $doctor->service_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    @else
        {!! Form::select('service_id', \App\Models\Service::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}

    @endif
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Teléfono:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Dirección:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Malpractice Ensurance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('malpractice_ensurance', 'Seguro de mala práxis:') !!}
    {!! Form::text('malpractice_ensurance', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'Usuario para acceder al sistema:') !!}
    @if(isset($doctor))
        {!! Form::select('user_id', \App\Models\Users::all()->pluck('name','id'), $doctor->user_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    @else
        {!! Form::select('user_id', \App\Models\Users::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
    @endif
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre y Apellido:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('doctors.index') !!}" class="btn btn-default">Cancelar</a>
</div>
