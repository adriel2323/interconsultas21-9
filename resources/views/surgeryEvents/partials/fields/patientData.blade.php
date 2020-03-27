<div class="panel panel-default">
    <div class="panel-title">
        <h3>Datos del Paciente</h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div id="updatePatientDataErrors"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('DNI', null, ['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::text('dni', $surgeryEvent->EventData->patient_document, ['class' => 'form-control', 'maxlength' => '10']) !!}
                    @else
                        {!! Form::text('dni', null, ['class' => 'form-control']) !!}
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('O.S', null, ['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('os_id', \App\Models\Os::all()->pluck('name','id'), $surgeryEvent->EventData->os, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la obra social']) !!}
                    @else
                        {!! Form::select('os_id', \App\Models\Os::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la obra social']) !!}
                    @endif
                </div>

            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('Nombre y Apellido', null, ['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::text('name', $surgeryEvent->EventData->patient_name, ['class' => 'form-control']) !!}
                    @else
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    @endif
                </div>
            </div>
        </div>

        @if(isset($surgeryEvent))
            @can('surgery.updatePatientData')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-warning form-control" type="button" onclick="updatePatientData();return false"><i class="fa fa-refresh"></i> <b>ACTUALIZAR DATOS DE PACIENTE</b></button>
                        </div>
                    </div>
                </div>
            @endcan
        @endif

    </div>
</div>