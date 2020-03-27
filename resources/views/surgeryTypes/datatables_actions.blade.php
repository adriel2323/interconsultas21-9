{!! Form::open(['id' => $id, 'route' => ['surgeryTypes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('surgeryTypes.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('surgeryType.edit')
        <a href="{{ route('surgeryTypes.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('surgeryType.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
                'class' => 'btn btn-danger btn-xs',
                'onclick' => "return confirmDelete(".$id."); return false;"
            ]) !!}
    @endcan
</div>
{!! Form::close() !!}
