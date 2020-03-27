@if(isset($users))
    <input type="hidden" name="id" id="id" value="{{$users->id}}" />
@endif

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Nombre y Apellido:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Profile Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role', 'Perfil:') !!}
    {!! Form::select('role', \Spatie\Permission\Models\Role::all()->pluck('name','name'), null, ['class' => 'form-control chosen-select', 'placeholder' => "Por favor seleccione una opción"]) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Usuario:') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Contraseña:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('repeat_password', 'Repite Contraseña:') !!}
    {!! Form::password('repeat_password', ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>
