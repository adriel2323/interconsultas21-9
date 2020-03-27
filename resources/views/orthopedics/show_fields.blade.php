<div class="col-sm-12">
    <div class="col-sm-6">
        <!-- Name Field -->
        <div class="form-group">
            {!! Form::label('name', 'Nombre:') !!}
            {!! Form::text('name', $orthopedics->name, ['class' => 'form-control', 'disabled']) !!}
        </div>
    </div>


    <div class="col-sm-6">
        <!-- Address Field -->
        <div class="form-group">
            {!! Form::label('address', 'Dirección:') !!}
            {!! Form::text('address', $orthopedics->address, ['class' => 'form-control', 'disabled']) !!}
        </div>
    </div>


    <div class="col-sm-6">
        <!-- Phone Field -->
        <div class="form-group">
            {!! Form::label('phone', 'Teléfono:') !!}
            {!! Form::text('phone', $orthopedics->phone, ['class' => 'form-control', 'disabled']) !!}
        </div>
    </div>


    <div class="col-sm-6">
        <!-- Created At Field -->
        <div class="form-group">
            {!! Form::label('created_at', 'Fecha de Creación:') !!}
            {!! Form::text('created_at', \Carbon\Carbon::parse($orthopedics->created_at)->format('d/m/Y'), ['class' => 'form-control', 'disabled']) !!}
        </div>
    </div>


    <div class="col-sm-6">
        <!-- Updated At Field -->
        <div class="form-group">
            {!! Form::label('updated_at', 'Fecha de actualización:') !!}
            {!! Form::text('updated_at', \Carbon\Carbon::parse($orthopedics->created_at)->format('d/m/Y'), ['class' => 'form-control', 'disabled']) !!}
        </div>
    </div>
</div>



