<!-- Requester Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requester_id', 'Solicitante:') !!}
    {!! Form::text('requester_id',$interconsulting->requester->name, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Requested Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requested_service_id', 'Servicio Solicitado:') !!}
    {!! Form::text('requested_service_id', $interconsulting->service->name, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Requested Doctor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requested_doctor_id', 'Solicitado:') !!}
    {!! Form::text('requested_doctor_id',$interconsulting->requested->name, ['class' => 'form-control', 'disabled']) !!}

    <div id="doctors"></div>
</div>

<!-- Observations Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('patient_name', 'Nombre del Paciente:') !!}
    {!! Form::text('patient_name', $interconsulting->patient_name, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Observations Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('observations', 'Observaciones:') !!}
    {!! Form::textarea('observations', $interconsulting->observations, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('created_at', 'Fecha de ingreso:') !!}
    {!! Form::text('created_at', \Carbon\Carbon::parse($interconsulting->created_at)->format('d/m/Y H:i'), ['class' => 'form-control', 'disabled']) !!}
</div>
