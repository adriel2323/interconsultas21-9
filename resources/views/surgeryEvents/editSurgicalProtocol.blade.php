{!! csrf_field() !!}
<div class="row">
    <div class="col-sm-12">
        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('patient_name', 'Paciente') !!}
                {!! Form::text('patient_name', $surgery->EventData->patient_name, ['class' => 'form-control', 'disabled']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('os_id', 'Obra Social') !!}
                {!! Form::select('os_id',\App\Models\Os::all()->pluck('name', 'id'), $surgery->EventData->Os->name, ['class' => 'form-control chosenSelect', 'disabled']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('start_date', 'Fecha y Hora de inicio') !!}
                {!! Form::datetimeLocal('start_date', \Carbon\Carbon::parse($surgery->start_date), ['class' => 'form-control']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('end_date', 'Fecha y hora de finalización') !!}
                {!! Form::datetimeLocal('end_date', \Carbon\Carbon::parse($surgery->end_date), ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('surgeon_id', 'Cirujano:') !!}
                    {!! Form::select('surgeon_id',\App\Models\Doctor::all()->pluck('name', 'id'), $surgery->EventData->surgeon_id, ['class' => 'form-control chosenSelect', 'disabled']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('anesthesists', 'Anestesistas') !!}
                {!! Form::select('anesthesists', $surgery->anesthesists->pluck('name','id'), $surgery->anesthesists->pluck('id','id'), ['class' => 'form-control chosenSelect', 'multiple', 'disabled']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('assistants', 'Ayudantes:') !!}
                {!! Form::select('assistants', $surgery->assistants->pluck('name','id'), $surgery->assistants->pluck('id','id'), ['class' => 'form-control chosenSelect', 'multiple', 'disabled']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('perfusion_specialist', 'Perfusion:') !!}
                {!! Form::select('perfusion_specialist', \App\Models\Doctor::all()->pluck('name','id'), $surgery->surgicalProtocol->perfusion_doctor_id, ['class' => 'form-control chosenSelect', 'placeholder' => 'Seleccione un médico']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('service_id', 'Servicio') !!}
                {!! Form::select('service_id', \App\Models\Service::all()->pluck('name','id'), 2, ['class' => 'form-control chosenSelect']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::label('pre_diagnostic', 'Diagnóstico pre-operatorio') !!}
                {!! Form::text('pre_diagnostic', $surgery->surgicalProtocol->pre_operatory_diagnostic, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::label('surgical_procedure', 'Procedimiento Quirúrgico') !!}
                {!! Form::text('surgical_procedure', $surgery->surgicalProtocol->surgical_procedure, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-sm-12">
                @include('helpers.editors.editor', ['text' => $surgery->surgicalProtocol->surgery_schema_description])
                {{--{!! Form::label('surgery_schema_description', 'Descripción y esquema operatorio') !!}--}}
                {{--{!! Form::textarea('surgery_schema_description', $surgery->surgicalProtocol->surgery_schema_description, ['class' => 'form-control classicEditor', 'id' => 'surgery_schema_description']) !!}--}}
            </div>

            <div class="form-group col-sm-12">
                <div class="pull-left">
                    <button class="btn btn-primary" type="button" disabled>Plantillas</button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div id="storeSurgicalProtocolErrors"></div>
    </div>
</div>
