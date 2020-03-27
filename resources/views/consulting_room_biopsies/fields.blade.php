<!-- Patient Document Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patient_document', 'DNI del Paciente:') !!}
    {!! Form::text('patient_document', null, ['class' => 'form-control']) !!}
</div>

<!-- Patient Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patient_name', 'Nombre del Paciente:') !!}
    {!! Form::text('patient_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Biopsy Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('biopsy_type', 'Tipo de Biopsia:') !!}
    {!! Form::select('biopsy_type', \App\Models\biopsies_types::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Por favor seleccione una opción']) !!}
</div>

<!-- Doctor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doctor', 'Médico Actuante:') !!}
    {!! Form::select('doctor', \App\Models\Doctor::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Por favor seleccione una opción']) !!}
</div>

<!-- Os Field -->
<div class="form-group col-sm-6">
    {!! Form::label('os', 'Obra Social:') !!}
    {!! Form::select('os', \App\Models\Os::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Por favor seleccione una opción']) !!}
</div>

@if(isset($consultingRoomBiopsies))
    <!-- Delivery Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('delivery_date', 'Fecha de Entrega:') !!}
        {!! Form::date('delivery_date', $consultingRoomBiopsies->delivery_date, ['class' => 'form-control']) !!}
    </div>
@else
    <!-- Delivery Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('delivery_date', 'Fecha de Entrega:') !!}
        {!! Form::date('delivery_date', null, ['class' => 'form-control']) !!}
    </div>
@endif

<!-- Autorized Order Field -->
<div class="form-group col-sm-6">
    {!! Form::label('autorized_order', 'Orden Autorizada:') !!}
    {!! Form::text('autorized_order', null, ['class' => 'form-control']) !!}
</div>

<!-- Patologist Field -->
<div class="form-group col-sm-6">
    {!! Form::label('patologist', 'Patólogo:') !!}
    {!! Form::select('patologist', \App\Models\Doctor::where('service_id',31)->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Por favor seleccione una opción']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('consultingRoomBiopsies.index') !!}" class="btn btn-default">Cancelar</a>
</div>
