<div class="col-sm-6">
    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'Id:') !!}
        {!! Form::text('id', $pATemplatesTitles->id, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Name Field -->
    <div class="form-group">
        {!! Form::label('name', 'Título:') !!}
        {!! Form::text('name', $pATemplatesTitles->name, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Fecha de Creación:') !!}
        {!! Form::text('created_at', $pATemplatesTitles->created_at, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Fecha de Actualización:') !!}
        {!! Form::text('updated_at', $pATemplatesTitles->updated_at, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


