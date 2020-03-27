<!-- Patient Name Field -->
<div class="form-group">
    {!! Form::label('patient_name', 'Nombre del Paciente:') !!}
    <p>{!! $consultingRoomBiopsies->patient_name !!}</p>
</div>

<!-- Biopsy Type Field -->
<div class="form-group">
    {!! Form::label('biopsy_type', 'Biopsy Type:') !!}
    <p>{!! $consultingRoomBiopsies->biopsy_type !!}</p>
</div>

<!-- Doctor Field -->
<div class="form-group">
    {!! Form::label('doctor', 'Médico Actuante:') !!}
    <p>{!! $consultingRoomBiopsies->doctor !!}</p>
</div>

<!-- Os Field -->
<div class="form-group">
    {!! Form::label('os', 'Obra Social:') !!}
    <p>{!! $consultingRoomBiopsies->os->name !!}</p>
</div>

<!-- Biopsy Number Field -->
<div class="form-group">
    {!! Form::label('biopsy_number', 'Número de Biopsia:') !!}
    <p>{!! $consultingRoomBiopsies->biopsy_number !!}</p>
</div>

<!-- Delivery Date Field -->
<div class="form-group">
    {!! Form::label('delivery_date', 'Fecha de Entrega:') !!}
    <p>{!! $consultingRoomBiopsies->delivery_date !!}</p>
</div>

<!-- Autorized Order Field -->
<div class="form-group">
    {!! Form::label('autorized_order', 'Orden Autorizada:') !!}
    <p>{!! $consultingRoomBiopsies->autorized_order !!}</p>
</div>

<!-- Patologist Field -->
<div class="form-group">
    {!! Form::label('patologist', 'Patólogo:') !!}
    <p>{!! $consultingRoomBiopsies->patologist->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de Creación:') !!}
    <p>{!! \Carbon\Carbon::parse($consultingRoomBiopsies->created_at)->format("d/m/Y") !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Fecha de Actualización:') !!}
    <p>{!! \Carbon\Carbon::parse($consultingRoomBiopsies->updated_at)->format("d/m/Y") !!}</p>
</div>