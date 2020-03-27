{!! Form::open(['id' => $id,'route' => ['emergencyConsultings.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @can('emergencyConsultings.edit')
        <a href="{{ route('emergencyConsultings.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('emergencyConsultings.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
