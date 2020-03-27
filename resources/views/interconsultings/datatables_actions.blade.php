{!! Form::open(['id' => $id,'route' => ['interconsultings.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    @can('interconsulting.view')
        <a href="{{ route('interconsultings.show', $id) }}" class='btn btn-default btn-xs'>
            <i class="glyphicon glyphicon-eye-open"></i>
        </a>
    @endcan
    @can('interconsulting.edit')
        <a href="{{ route('interconsultings.edit', $id) }}" class='btn btn-warning btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('interconsulting.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete(".$id."); return false;"
        ]) !!}
    @endcan
    @can('interconsulting.changeStatus')
        <button type="button" class="btn btn-xs" style='background-color:yellow;color:grey;' onclick="location.href='/interconsulting/changeStatus/{{$id}}/1'">Ingresado</button>
        <button type="button" class="btn btn-xs" style='background-color:red;color:#fff;' onclick="location.href='/interconsulting/changeStatus/{{$id}}/4'">Cancelar</button>
        <button type="button" class="btn btn-xs" style='background-color:blue;color:#fff;' onclick="location.href='/interconsulting/changeStatus/{{$id}}/2'">Visto</button>
        <button type="button" class="btn btn-xs" style='background-color:green;color:#fff;' onclick="location.href='/interconsulting/changeStatus/{{$id}}/3'">Atendido</button>
    @endcan
</div>
{!! Form::close() !!}
