<!-- Cuit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cuit', 'Cuit:') !!}
    {!! Form::text('cuit', null, ['class' => 'form-control']) !!}
</div>

<!-- Fantasy Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fantasy_name', 'Nombre de fantasía:') !!}
    {!! Form::text('fantasy_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Pay Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pay_name', 'Nombre en el cheque:') !!}
    {!! Form::text('pay_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Dirección:') !!}
    {!! Form::text('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('accountingVendors.index') !!}" class="btn btn-warning">Cancelar</a>
</div>
