{!! Form::open(['id' => $id, 'route' => ['pathologicalCategoryClassTwo.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('pathologicalCategoryClassTwo.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('pathologyCategoryClassTwo.edit')
        <a href="{{ route('pathologicalCategoryClassTwo.edit', $id) }}" class='btn btn-warning btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('pathologyCategoryClassTwo.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'button',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete({$id});return false;"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
