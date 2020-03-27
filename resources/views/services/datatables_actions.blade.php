{!! Form::open(['id' => $id,'route' => ['services.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('services.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('services.edit')
    <a href="{{ route('services.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @endcan
    @can('services.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
