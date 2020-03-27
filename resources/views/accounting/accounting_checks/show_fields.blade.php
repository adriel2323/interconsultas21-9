<div class="col-sm-6">
    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'Id:') !!}
        {!! Form::text('id', $accountingCheck->id, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Check Number Field -->
    <div class="form-group">
        {!! Form::label('check_number', 'Check Number:') !!}
        {!! Form::text('check_number', $accountingCheck->check_number, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Accounting Vendor Id Field -->
    <div class="form-group">
        {!! Form::label('accounting_vendor_id', 'Accounting Vendor Id:') !!}
        {!! Form::text('accounting_vendor_id', $accountingCheck->accounting_vendor_id, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Accounting Bank Account Field -->
    <div class="form-group">
        {!! Form::label('accounting_bank_account', 'Accounting Bank Account:') !!}
        {!! Form::text('accounting_bank_account', $accountingCheck->accounting_bank_account, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Emission Date Field -->
    <div class="form-group">
        {!! Form::label('emission_date', 'Emission Date:') !!}
        {!! Form::text('emission_date', $accountingCheck->emission_date, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Expiration Date Field -->
    <div class="form-group">
        {!! Form::label('expiration_date', 'Expiration Date:') !!}
        {!! Form::text('expiration_date', $accountingCheck->expiration_date, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Pay Name Field -->
    <div class="form-group">
        {!! Form::label('pay_name', 'Pay Name:') !!}
        {!! Form::text('pay_name', $accountingCheck->pay_name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Amount Field -->
    <div class="form-group">
        {!! Form::label('amount', 'Amount:') !!}
        {!! Form::text('amount', $accountingCheck->amount, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Created By Field -->
    <div class="form-group">
        {!! Form::label('created_by', 'Created By:') !!}
        {!! Form::text('created_by', $accountingCheck->created_by, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated By Field -->
    <div class="form-group">
        {!! Form::label('updated_by', 'Updated By:') !!}
        {!! Form::text('updated_by', $accountingCheck->updated_by, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Deleted By Field -->
    <div class="form-group">
        {!! Form::label('deleted_by', 'Deleted By:') !!}
        {!! Form::text('deleted_by', $accountingCheck->deleted_by, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        {!! Form::text('created_at', $accountingCheck->created_at, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        {!! Form::text('updated_at', $accountingCheck->updated_at, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Deleted At Field -->
    <div class="form-group">
        {!! Form::label('deleted_at', 'Deleted At:') !!}
        {!! Form::text('deleted_at', $accountingCheck->deleted_at, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


