{!! Form::open(['id' => $id, 'route' => ['pathologicalCategoryClassThree.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('pathologicalCategoryClassThree.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @can('pathologyCategoryClassThree.edit')
        <a href="{{ route('pathologicalCategoryClassThree.edit', $id) }}" class='btn btn-warning btn-xs'>
            <i class="glyphicon glyphicon-edit"></i>
        </a>
    @endcan
    @can('pathologyCategoryClassThree.delete')
        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
            'type' => 'button',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => "return confirmDelete({$id});return false;"
        ]) !!}
    @endcan
</div>
{!! Form::close() !!}
