<div class="row col-sm-12">
    <!-- Accounting Bank Account Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('accounting_bank_account', 'Banco:') !!}
        @if(isset(\App\Models\Accounting\AccountingCheck::latest()->first()->accounting_bank_account))
            {!! Form::select('accounting_bank_account', \App\Models\Accounting\AccountingBank::all()->pluck('name','id'), \App\Models\Accounting\AccountingCheck::latest()->first()->accounting_bank_account, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un banco', 'onchange' => 'getLastCheckNumber();']) !!}
        @else
            {!! Form::select('accounting_bank_account', \App\Models\Accounting\AccountingBank::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un banco', 'onchange' => 'getLastCheckNumber();']) !!}
        @endif
    </div>

    <!-- Check Number Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('check_number', 'Número de cheque:') !!}
        @if(isset(\App\Models\Accounting\AccountingCheck::latest()->first()->check_number))
            {!! Form::number('check_number', \App\Models\Accounting\AccountingCheck::latest()->first()->check_number + 1, ['class' => 'form-control']) !!}
        @else
            {!! Form::number('check_number', null, ['class' => 'form-control']) !!}
        @endif
    </div>
</div>

<div class="row col-sm-12">
    <!-- Accounting Vendor Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('accounting_vendor_id', 'Proveedor:') !!}
        {!! Form::select('accounting_vendor_id', \App\Models\Accounting\Vendor::all()->pluck('fantasy_name', 'id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un proveedor', 'onchange' => 'getVendorPayName();']) !!}
    </div>

    <!-- Emission Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('emission_date', 'Fecha de Emisión:') !!}
        {!! Form::date('emission_date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="row col-sm-12">
    <!-- Amount Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('amount', 'Monto:') !!}
        {!! Form::text('amount', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Expiration Date Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('expiration_date', 'Fecha de Expiración:') !!}
        <div class="form-inline" style="width: 100%">
            {!! Form::date('expiration_date', null, ['class' => 'form-control']) !!}
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('0')">0</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('15')">15</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('30')">30</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('45')">45</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('60')">60</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('90')">90</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('120')">120</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('150')">150</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('180')">180</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('210')">210</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('240')">240</button>
            <button type="button" class="btn btn-warning form-control" onclick="setExpirationDate('270')">270</button>
        </div>
    </div>

</div>

<div class="row col-sm-12">
    <!-- Pay Name Field -->
    <div class="col-sm-6">
        {!! Form::label('pay_name', 'Páguese a:') !!}
        <div class="input-group">
            {!! Form::text('pay_name', null, ['class' => 'form-control', 'placeholder' => 'Páguese A:']) !!}
            <div class="input-group-btn">
                <button title="Actualizar nombre" type="button" class="btn btn-warning form-control" onclick="getVendorPayName();return false;"><i class="fa fa-refresh"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="row col-sm-12">
    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('accountingChecks.index') !!}" class="btn btn-warning">Cancelar</a>
    </div>
</div>

