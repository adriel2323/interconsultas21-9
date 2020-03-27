<div class="row">
    <div class="col-sm-12">
        <div style="text-align: center;">
            <h3>Ingrese un rango de cheques</h3>
        </div>

        <div class="form-group col-sm-12">
            {!! Form::label('Seleccione una cuenta bancaria.') !!}
            {!! Form::select('bankAccountId', \App\Models\Accounting\AccountingBank::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una cuenta bancaria.']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('Desde número de cheque.') !!}
            {!! Form::text('fromCheckNumber', null, ['class' => 'form-control', 'placeholder' => 'Desde número de cheque']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('Hasta número de cheque.') !!}
            {!! Form::text('toCheckNumber', null, ['class' => 'form-control', 'placeholder' => 'Hasta número de cheque']) !!}
        </div>
    </div>
</div>