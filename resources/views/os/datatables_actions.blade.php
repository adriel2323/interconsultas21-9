{!! Form::open(['id' => $id,'route' => ['os.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('os.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('os.edit')
        <a href="{{ route('os.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('os.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
