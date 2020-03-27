<!-- Requester Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requester_id', 'Solicitante:') !!}
    @if(!isset($interconsulting))
        {!! Form::select('requester_id', \App\Models\Users::all()->pluck('name','id'), Auth::user()->id, ['class' => 'form-control chosen-select']) !!}
    @else
        {!! Form::select('requester_id', \App\Models\Users::all()->pluck('name','id'), $interconsulting->requester_id, ['class' => 'form-control chosen-select']) !!}
    @endif
</div>

<!-- Requested Service Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requested_service_id', 'Servicio Solicitado:') !!}
    @if(!isset($interconsulting))
        {!! Form::select('requested_service_id', \App\Models\Service::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'onchange' => 'getDoctors($(this).val());', 'placeholder' => 'Seleccione un servicio']) !!}
    @else
        {!! Form::select('requested_service_id', \App\Models\Service::all()->pluck('name','id'), $interconsulting->requested_service_id, ['class' => 'form-control chosen-select', 'onchange' => 'getDoctors($(this).val());', 'placeholder' => 'Seleccione un servicio']) !!}
    @endif
</div>

<!-- Requested Doctor Id Field -->
<div class="form-group col-sm-6">
    @if(!isset($interconsulting))
        {!! Form::label('requested_doctor_id', 'Solicitado:') !!}
        <div id="doctors"></div>
    @else
        {!! Form::label('requested_doctor_id', 'Solicitado:') !!}
        {!! Form::select('requested_doctor_id', \App\Models\Doctor::all()->pluck('name','id'), $interconsulting->requested_doctor_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un servicio']) !!}
        <div id="doctors"></div>
    @endif
</div>

<!-- Room Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('room_id', 'Habitación:') !!}
    @if(!isset($consulting))
        {!! Form::select('room_id', \App\Models\Rooms::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select']) !!}
    @else
        {!! Form::select('room_id', \App\Models\Rooms::all()->pluck('name','id'), $interconsulting->room_id, ['class' => 'form-control chosen-select']) !!}
    @endif
</div>

<!-- patient name Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('patient_name', 'Nombre del paciente:') !!}
    @if(!isset($interconsulting))
        {!! Form::text('patient_name', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('patient_name', $interconsulting->patient_name, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Observations Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('observations', 'Observaciones:') !!}
    @if(!isset($interconsulting))
        {!! Form::textarea('observations', null, ['class' => 'form-control']) !!}
    @else
        {!! Form::textarea('observations', $interconsulting->observations, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('interconsultings.index') !!}" class="btn btn-default">Cancelar</a>
</div>
