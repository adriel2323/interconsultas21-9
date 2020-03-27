<div class="col-sm-6">
    <!-- Id Field -->
    <div class="form-group">
        {!! Form::label('id', 'Id:') !!}
        {!! Form::text('id', $webNews->id, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Image Url Field -->
    <div class="form-group">
        {!! Form::label('image_url', 'Image Url:') !!}
        {!! Form::text('image_url', $webNews->image_url, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Title Field -->
    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', $webNews->title, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Short Description Field -->
    <div class="form-group">
        {!! Form::label('short_description', 'Short Description:') !!}
        {!! Form::text('short_description', $webNews->short_description, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Extended Description Field -->
    <div class="form-group">
        {!! Form::label('extended_description', 'Extended Description:') !!}
        {!! Form::textarea('extended_description', $webNews->extended_description, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Created At Field -->
    <div class="form-group">
        {!! Form::label('created_at', 'Created At:') !!}
        {!! Form::text('created_at', $webNews->created_at, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


<div class="col-sm-6">
    <!-- Updated At Field -->
    <div class="form-group">
        {!! Form::label('updated_at', 'Updated At:') !!}
        {!! Form::text('updated_at', $webNews->updated_at, ['class' => 'form-control', 'disabled']) !!}
    </div>
</div>


