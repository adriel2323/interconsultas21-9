<div class="row">
    <div class="col-sm-12">
        <div class="form-group col-sm-6">
            {!! Form::label('from','Fecha Inicial',['class' => 'control-label']) !!}
            {!! Form::date('from', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group col-sm-6">
            {!! Form::label('to','Fecha Final',['class' => 'control-label']) !!}
            {!! Form::date('to', null, ['class' => 'form-control']) !!}
        </div>
    </div>
</div>
