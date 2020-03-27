{!! Form::open(['id' => $id,'route' => ['biopsiesTypes.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('biopsiesTypes.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('biopsyTypes.edit')
        <a href="{{ route('biopsiesTypes.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('biopsyTypes.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
