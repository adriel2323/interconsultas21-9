<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            {!! Form::label('doctor_id', 'Médico:') !!}
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="input-group-text" id="doctor"><i class="fa fa-user-md"></i></span>
                </div>

                {!! Form::select('doctor_id', \App\Models\Doctor::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione el Cirujano', 'aria-label' => 'Seleccione el Cirujano', 'aria-describedby' => 'doctor']) !!}
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            {!! Form::label('from', 'Desde:') !!}
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="input-group-text" id="calendar"><i class="fa fa-calendar"></i></span>
                </div>

                {!! Form::date('from', null, ['class' => 'form-control', 'placeholder' => 'Fecha inicial', 'aria-label' => 'Fecha inicial', 'aria-describedby' => 'calendar']) !!}
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            {!! Form::label('to', 'Hasta:') !!}
            <div class="input-group">
                <div class="input-group-addon">
                    <span class="input-group-text" id="calendar"><i class="fa fa-calendar"></i></span>
                </div>

                {!! Form::date('to', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>

</div>