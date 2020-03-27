<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('name', 'Nombre:') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la institución']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('phone', 'Teléfono:') !!}
        {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Teléfono de la institución']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('address', 'Dirección:') !!}
        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Dirección de la institución']) !!}
    </div>
</div>

<div class="row">
    <div class="form-group col-md-4">
        {!! Form::label('contact_name', 'Contácto:') !!}
        {!! Form::text('contact_name', null, ['class' => 'form-control', 'placeholder' => 'Nombre del contacto con la institución']) !!}
    </div>
</div>

<div class="row">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('institutions.index') !!}" class="btn btn-default">Cancelar</a>
    </div>

</div>