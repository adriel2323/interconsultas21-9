<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Número de recibo:') !!}
    {!! Form::text('number', $receipts->number, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('amount', 'Monto:') !!}
    {!! Form::text('amount', $receipts->amount, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Company Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company', 'Persona / Compañía que entrega:') !!}
    {!! Form::text('company', $receipts->company, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Fecha de creación:') !!}
    {!! Form::text('created_at', $receipts->created_at, ['class' => 'form-control', 'disabled']) !!}
</div>

<!-- Comments Field -->
<div class="form-group col-sm-12">
    {!! Form::label('comments', 'Comentarios:') !!}
    {!! Form::textarea('comments', $receipts->comments, ['class' => 'form-control', 'disabled']) !!}
</div>