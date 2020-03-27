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
                {!! Form::text('os_id', $surgery->EventData->Os->name, ['class' => 'form-control', 'disabled']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('start_date', 'Fecha y Hora de inicio') !!}
                {!! Form::datetimeLocal('start_date', \Carbon\Carbon::parse($surgery->start_date), ['class' => 'form-control', 'disabled']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('end_date', 'Fecha y hora de finalización') !!}
                {!! Form::datetimeLocal('end_date', \Carbon\Carbon::parse($surgery->end_date), ['class' => 'form-control', 'disabled']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('surgeon_id', 'Cirujano:') !!}
                @if(!empty($surgery->EventData->surgeon))
                    {!! Form::text('surgeon_id', $surgery->EventData->surgeon->name, ['class' => 'form-control', 'disabled']) !!}
                @else
                    {!! Form::text('surgeon_id', null, ['class' => 'form-control', 'disabled']) !!}
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('anesthesists', 'Anestesistas') !!}
                @if(!empty($surgery->anesthesists))
                    {!! Form::select('anesthesists', $surgery->anesthesists->pluck('name','id'), $surgery->anesthesists->pluck('id','id'), ['class' => 'form-control chosenSelect', 'multiple', 'disabled']) !!}
                @else
                    {!! Form::select('anesthesists', null, null, ['class' => 'form-control chosenSelect', 'multiple', 'disabled']) !!}
                @endif
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('assistants', 'Ayudantes:') !!}
                @if(!empty($surgery->assistants))
                    {!! Form::select('assistants', $surgery->assistants->pluck('name','id'), $surgery->assistants->pluck('id','id'), ['class' => 'form-control chosenSelect', 'multiple', 'disabled']) !!}
                @else
                    {!! Form::select('assistants', null, null, ['class' => 'form-control chosenSelect', 'multiple', 'disabled']) !!}
                @endif
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('perfusion_specialist', 'Perfusion:') !!}
                {!! Form::select('perfusion_specialist', \App\Models\Doctor::all()->pluck('name','id'), null, ['class' => 'form-control chosenSelect', 'placeholder' => 'Seleccione un médico']) !!}
            </div>

            <div class="form-group col-sm-6">
                {!! Form::label('service_id', 'Servicio') !!}
                {!! Form::select('service_id', \App\Models\Service::all()->pluck('name','id'), 2, ['class' => 'form-control chosenSelect']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::label('pre_diagnostic', 'Diagnóstico pre-operatorio') !!}
                {!! Form::text('pre_diagnostic', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-sm-12">
                {!! Form::label('surgical_procedure', 'Procedimiento Quirúrgico') !!}
                {!! Form::text('surgical_procedure', null, ['class' => 'form-control classicEditor']) !!}
            </div>
        </div>

        <div class="row">

            <div class="form-group col-sm-12">
                @include('helpers.editors.editor')
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
