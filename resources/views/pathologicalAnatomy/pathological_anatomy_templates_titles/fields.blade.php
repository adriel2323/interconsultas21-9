<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Título:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paTemplatesTitles.index') !!}" class="btn btn-warning">Cancelar</a>
</div>
