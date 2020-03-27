<div class="panel panel-default">
    <div class="panel-title"><h3>Comentarios</h3></div>
    <div class="panel-body">
        <div class="form-group">
            @if(isset($surgeryEvent))
                {!! Form::textarea('comments', $surgeryEvent->EventData->comments, ['class' => 'form-control']) !!}
            @else
                {!! Form::textarea('comments', null, ['class' => 'form-control']) !!}
            @endif
        </div>
        @if(isset($surgeryEvent))
            @can('surgery.updateSurgeryComments')
                <div class="form-group">
                    <button class="btn btn-success form-control" onclick="saveComments();return false;"><i class="fa fa-save"></i> Guardar comentarios</button>
                </div>
            @endcan
        @endif
    </div>
</div>