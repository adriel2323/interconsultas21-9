{!! Form::open(['id' => $id,'route' => ['profiles.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ url('/profiles/setPermissions/'.$id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-lock"></i>
    </a>
    @can('roles.edit')
        <a href="{{ route('profiles.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    @endcan
    <a href="{{ route('profiles.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    @can('roles.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
