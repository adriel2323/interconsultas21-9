<!-- Patient Name Field -->
<div class="form-group">
    {!! Form::label('patient_name', 'Nombre del Paciente:') !!}
    <p>{!! $internshipBiopsies->patient_name !!}</p>
</div>

<!-- Doctor Field -->
<div class="form-group">
    {!! Form::label('doctor', 'Médico Actuante:') !!}
    <p>{!! $internshipBiopsies->user->name !!}</p>
</div>

<!-- Os Field -->
<div class="form-group">
    {!! Form::label('os', 'Obra Social:') !!}
    <p>{!! $internshipBiopsies->os->name !!}</p>
</div>

<!-- Biopsy Number Field -->
<div class="form-group">
    {!! Form::label('biopsy_number', 'Número de Biopsia:') !!}
    <p>{!! $internshipBiopsies->biopsy_number !!}</p>
</div>

<!-- Delivery Date Field -->
<div class="form-group">
    {!! Form::label('delivery_date', 'Fecha de Entrega:') !!}
    <p>{!! $internshipBiopsies->delivery_date !!}</p>
</div>

<!-- Autorized Order Field -->
<div class="form-group">
    {!! Form::label('autorized_order', 'Orden Autorizada:') !!}
    <p>{!! $internshipBiopsies->autorized_order !!}</p>
</div>

<!-- Patologist Field -->
<div class="form-group">
    {!! Form::label('patologist', 'Patólogo:') !!}
    <p>{!! $internshipBiopsies->patologist->name !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Fecha de Creación:') !!}
    <p>{!! \Carbon\Carbon::parse($internshipBiopsies->created_at)->format("d/m/Y") !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Fecha de Actualización:') !!}
    <p>{!! \Carbon\Carbon::parse($internshipBiopsies->updated_at)->format("d/m/Y") !!}</p>
</div>

