{!! csrf_field() !!}
<div class="form-group col-sm-6">
    {!! Form::label('product', 'Medicamento a buscar', ['class' => 'control-label']) !!}
    {!! Form::text('product', null, ['class' => 'form-control']) !!}
    <button type="button" class="btn btn-primary form-control" onclick="searchInKairos();return false;"><i class="fa fa-search">Buscar</i></button>
</div>
