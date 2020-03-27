{!! Form::open(['id' => $id, 'route' => ['accountingVendors.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('accountingVendors.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('accountingVendors.edit', $id) }}" class='btn btn-warning btn-xs'>
        <i class="glyphicon glyphicon-edit"></i>
    </a>
    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
        'type' => 'button',
        'class' => 'btn btn-danger btn-xs',
        'onclick' => "return confirmDelete({$id});return false;"
    ]) !!}
</div>
{!! Form::close() !!}
