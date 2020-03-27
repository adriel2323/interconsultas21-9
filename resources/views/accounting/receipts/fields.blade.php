<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Número de recibo:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Receipt Date -->
<div class="form-group col-sm-6">
    {!! Form::label('receipt_date', 'Fecha del recibo:') !!}
    @if(isset($receipts))
        {!! Form::date('receipt_date', $receipts->receipt_date, ['class' => 'form-control']) !!}
    @else
        {!! Form::date('receipt_date', null, ['class' => 'form-control']) !!}
    @endif

</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Monto:') !!}
    {!! Form::text('amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company', 'Nombre de la persona / empresa que entrega:') !!}
    {!! Form::text('company', null, ['class' => 'form-control']) !!}
</div>

<!-- Comments Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('comments', 'Comentarios:') !!}
    {!! Form::textarea('comments', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-warning']) !!}
    <a href="{!! route('accounting.receipts.index') !!}" class="btn btn-default">Cancelar</a>
</div>
