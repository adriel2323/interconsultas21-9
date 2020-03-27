<div class="row">
    <div class="col-sm-12">
        {!! csrf_field() !!}
        {!! Form::hidden('id', $surgeryEvent->id) !!}
        <div class="col-sm-12">
            @include('surgeryEvents.partials.fields.eventData')
        </div>
        <div class="col-sm-12">
            @include('surgeryEvents.partials.fields.patientData')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="col-sm-12">
            @include('surgeryEvents.partials.fields.surgeryData')
        </div>
        <div class="col-sm-12">
            @include('surgeryEvents.partials.fields.changeState')
        </div>
        <div class="col-sm-12"></div>
        <div class="col-sm-12">
            @include('surgeryEvents.partials.fields.comments')
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div id="resultadoModal"></div>
    </div>
</div>