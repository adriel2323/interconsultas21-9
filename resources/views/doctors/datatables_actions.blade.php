{!! Form::open(['id' => $id, 'route' => ['doctors.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @can('doctors.view')
        <a href="{{ route('doctors.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    @endcan
    @can('doctors.edit')
        <a href="{{ route('doctors.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('doctors.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
