<div class="panel panel-default">
    <div class="panel-title">
        <div class="col-sm-12">
            <div class="pull-left">
                <h3>Cambiar estado del turno.</h3>
            </div>
        </div>

    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <div id="changeEventStatusErrors"></div>
            </div>
        </div>
        <div class="row">
            <div class='btn-group'>
                @foreach(\App\Models\Surgery\EventStatus::all() as $status)
                    <button onclick="changeEventStatus({{$status->id}});return false;" class="btn btn-primary btn-md" style="background-color: {{$status->color}};border: 1px solid {{$status->color}};color: black;"><b>{{$status->name}}</b></button>
                @endforeach
            </div>
        </div>
   </div>
</div>