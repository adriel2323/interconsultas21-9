<!-- Os Field -->
<div class="form-group col-sm-6">
    {!! Form::label('os', 'Obra Social:') !!}
    {!! Form::select('os',\App\Models\Os::all()->pluck('name','id') , null, ['class' => 'form-control chosen-select','placeholder' => 'Seleccione una opción']) !!}
</div>

<!-- Doctor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('doctor', 'Médico:') !!}
    {!! Form::select('doctor', \App\Models\Users::all()->pluck('name', 'id') , null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una opción']) !!}
</div>

<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'DNI:') !!}
    {!! Form::number('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre y Apellido:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('emergencyConsultings.index') !!}" class="btn btn-default">Cancelar</a>
</div>
