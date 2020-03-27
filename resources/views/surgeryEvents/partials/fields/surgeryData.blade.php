<div class="panel panel-default">
    <div class="panel-title">
        <h3>Datos de la cirugía</h3>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-sm-12">
                <div id="updateSurgeryDataErrors"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('Cirujano', null, ['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('surgeon_id', \App\Models\Doctor::all()->pluck('name','id'), $surgeryEvent->EventData->surgeon_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un médico']) !!}
                    @else
                        {!! Form::select('surgeon_id', \App\Models\Doctor::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un médico']) !!}
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('Tipo de Cirugía', null, ['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('surgery_type_id',\App\Models\Surgery\SurgeryType::whereNull('deleted_at')->get()->pluck('description','id') , $surgeryEvent->EventData->surgery_type_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Selecccione el tipo de cirugía']) !!}
                    @else
                        {!! Form::select('surgery_type_id',\App\Models\Surgery\SurgeryType::whereNull('deleted_at')->get()->pluck('description','id') , null, ['class' => 'form-control chosen-select', 'placeholder' => 'Selecccione el tipo de cirugía']) !!}
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('Médicos Ayudantes', null, ['class' => 'label-control']) !!}

                    @if(isset($surgeryEvent))
                        {!! Form::select('assistants_ids', \App\Models\Doctor::all()->pluck('name','id'), $surgeryEvent->assistants, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @else
                        {!! Form::select('assistants_ids', \App\Models\Doctor::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @endif

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            @if(isset($surgeryEvent))
                                @if($surgeryEvent->EventData->biopsy == 1)
                                    <input type="checkbox" name="biopsy" id="biopsy" checked/>
                                @else
                                    <input type="checkbox" name="biopsy" id="biopsy" />
                                @endif
                            @else
                                <input type="checkbox" name="biopsy" id="biopsy" />
                            @endif
                            <b>¿Envía Biopsia?</b>
                        </label>
                        <label>
                            @if(isset($surgeryEvent))
                                @if($surgeryEvent->EventData->local_anesthesia)
                                    <input type="checkbox" class="checkbox" id="local_anesthesia" checked/>
                                @else
                                    <input type="checkbox" class="checkbox" id="local_anesthesia" />
                                @endif
                            @else
                                <input type="checkbox" class="checkbox" id="local_anesthesia" />
                            @endif

                            <b>Anestesia Local</b>
                        </label>

                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="checkbox">
                    <label>
                        @if(isset($surgeryEvent))
                            @if($surgeryEvent->EventData->sedation)
                                <input type="checkbox" class="checkbox" id="sedation" checked/>
                            @else
                                <input type="checkbox" class="checkbox" id="sedation" />
                            @endif
                        @else
                            <input type="checkbox" class="checkbox" id="sedation" />
                        @endif

                        <b>Sedación</b>
                    </label>
                    <label>
                        @if(isset($surgeryEvent))
                            @if($surgeryEvent->EventData->x_ray_specialist_needed)
                                <input type="checkbox" class="checkbox" id="x_ray_specialist_needed" checked/>
                            @else
                                <input type="checkbox" class="checkbox" id="x_ray_specialist_needed" />
                            @endif
                        @else
                            <input type="checkbox" class="checkbox" id="x_ray_specialist_needed" />
                        @endif

                        <b>Requiere Técnico RX</b>
                    </label>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('anesthesists', 'Anestesiologos') !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('anesthesists', \App\Models\Doctor::where('service_id', 30)->get()->pluck('name','id'), $surgeryEvent->anesthesists, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @else
                        {!! Form::select('anesthesists', \App\Models\Doctor::where('service_id', 30)->get()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('nurses', 'Enfermeras') !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('nurses', \App\Models\Doctor::where('service_id', 37)->get()->pluck('name','id'), $surgeryEvent->nurses, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @else
                        {!! Form::select('nurses', \App\Models\Doctor::where('service_id', 37)->get()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('instrumentists', 'Instrumentadores') !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('instrumentists', \App\Models\Doctor::where('service_id', 37)->get()->pluck('name','id'), $surgeryEvent->instrumentists, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @else
                        {!! Form::select('instrumentists', \App\Models\Doctor::where('service_id', 37)->get()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('rx_specialists', 'Técnicos de rayos') !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('rx_specialists', \App\Models\Doctor::where('service_id', 34)->get()->pluck('name','id'), $surgeryEvent->rxSpecialists, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @else
                        {!! Form::select('rx_specialists', \App\Models\Doctor::where('service_id', 34)->get()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'multiple']) !!}
                    @endif
                </div>
            </div>
        </div>
        @if(isset($surgeryEvent))
            @can('surgery.updateSurgeryData')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-warning form-control" type="button" onclick="updateSurgeryData();return false"><i class="fa fa-refresh"></i> <b>ACTUALIZAR DATOS DE LA CIRUGÍA</b></button>
                        </div>
                    </div>
                </div>
            @endcan
         @endif
    </div>
</div>

