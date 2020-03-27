<div class="form-group">
    {!! Form::open(['id' => $row->id,'route' => ['PASample.destroy', $row->id], 'method' => 'delete']) !!}
        <button title="Información" type="button" class="btn btn-primary"><i class="fa fa-info-circle"></i></button>

            @can('pathologyCategoryClassOne.delete')
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                    'class' => 'btn btn-danger',
                    'onclick' => "return confirmDelete(".$row->id."); return false;"
                ]) !!}
            @endcan
    {!! Form::close() !!}
</div>