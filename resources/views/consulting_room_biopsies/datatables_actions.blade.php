{!! Form::open(['id' => $id,'route' => ['consultingRoomBiopsies.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
     @can('consultingRoomBiopsies.edit')
        <a href="{{ route('consultingRoomBiopsies.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
     @endcan
     @can('consultingRoomBiopsies.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
     @endcan
</div>
{!! Form::close() !!}
