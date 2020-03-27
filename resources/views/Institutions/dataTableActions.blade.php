{!! Form::open(['id' => $row->id, 'route' => ['institutions.destroy', $row->id], 'method' => 'delete']) !!}
<div class='btn-group'>
        <a href="{{ route('institutions.edit', $row->id) }}" class='btn btn-default btn-sm'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-sm',
            'onclick' => "return confirmDelete(".$row->id."); return false;"
        ]) !!}
</div>
{!! Form::close() !!}
