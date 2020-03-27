{!! Form::open(['id' => $id,'route' => ['internshipBiopsies.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
     @can('internshipBiopsies.edit')
        <a href="{{ route('internshipBiopsies.edit', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
     @endcan
     @can('internshipBiopsies.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
     @endcan
</div>
{!! Form::close() !!}
