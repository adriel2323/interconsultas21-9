<div class="panel panel-default">
    <div class="panel-title">
        <div class="col-sm-12">
            <div class="pull-left">
                <h3>Datos del turno</h3>
            </div>
        </div>

    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div id="updateEventDataErrors"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('Fecha y hora de inicio',null,['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::datetimeLocal('start_date', \Carbon\Carbon::parse($surgeryEvent->start_date),['class' => 'form-control', 'onblur' => 'updateEndDate();']) !!}
                    @else
                        @if($date != null)
                            {!! Form::datetimeLocal('start_date',\Carbon\Carbon::createFromFormat('Y-m-d-Hi', $date),['class' => 'form-control', 'onblur' => 'updateEndDate();']) !!}
                        @else
                            {!! Form::datetimeLocal('start_date', null, ['class' => 'form-control', 'onblur' => 'updateEndDate();']) !!}
                        @endif
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('Habitación de origen', null, ['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('origin_room_id', \App\Models\Rooms::all()->pluck('name','id'), $surgeryEvent->EventData->origin_room_id,['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la habitación de origen']) !!}
                    @else
                        {!! Form::select('origin_room_id', \App\Models\Rooms::all()->pluck('name','id'), null,['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la habitación de origen']) !!}
                    @endif
                </div>
                <div class="form-group">
                    {!! Form::label('Habitación de destino', null, ['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('room_id', \App\Models\Rooms::all()->pluck('name','id'), $surgeryEvent->EventData->room_id, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la habitación de destino']) !!}
                    @else
                        {!! Form::select('room_id', \App\Models\Rooms::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione la habitación de destino']) !!}
                    @endif
                    <div class="checkbox">
                        <label>
                            @if(isset($surgeryEvent))
                                @if($surgeryEvent->EventData->transitory_check_in)
                                    <input type="checkbox" class="checkbox" value="Ingresa en Internación Transitoria" id="transitory_check_in" checked/>
                                @else
                                    <input type="checkbox" class="checkbox" value="Ingresa en Internación Transitoria" id="transitory_check_in" />
                                @endif
                            @else
                                <input type="checkbox" class="checkbox" value="Ingresa en Internación Transitoria" id="transitory_check_in" />
                            @endif

                            <b>Ingresa en Internación Transitoria.</b>
                        </label>

                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('Fecha y hora de finalización',null,['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::datetimeLocal('end_date',  \Carbon\Carbon::parse($surgeryEvent->end_date),['class' => 'form-control']) !!}
                    @else
                        @if($date != null)
                            {!! Form::datetimeLocal('end_date',\Carbon\Carbon::createFromFormat('Y-m-d-Hi', $date)->addHour(),['class' => 'form-control', 'onblur' => 'updateEndDate();']) !!}
                        @else
                            {!! Form::datetimeLocal('end_date', null, ['class' => 'form-control', 'onblur' => 'updateEndDate();']) !!}
                        @endif
                    @endif
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('Seleccione un quirófano', null, ['class' => 'label-control']) !!}
                    @if(isset($surgeryEvent))
                        {!! Form::select('resource_id', \App\Models\Surgery\SurgeryRoom::all()->pluck('name','id'), $surgeryEvent->resource_id,['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione el quirófano']) !!}
                    @else
                        @if($date != null)
                            {!! Form::select('resource_id', \App\Models\Surgery\SurgeryRoom::all()->pluck('name','id'), $resourceId,['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione el quirófano']) !!}
                        @else
                            {!! Form::select('resource_id', \App\Models\Surgery\SurgeryRoom::all()->pluck('name','id'), null,['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione el quirófano']) !!}
                        @endif
                    @endif
                </div>
            </div>
        </div>

        @if(isset($surgeryEvent))
            @can('surgery.updateSurgeryEventData')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button class="btn btn-warning form-control" type="button" onclick="updateEventData();return false"><i class="fa fa-refresh"></i> <b>ACTUALIZAR DATOS DEL TURNO</b></button>
                        </div>
                    </div>
                </div>
            @endcan
        @endif
    </div>
</div>