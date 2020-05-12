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
    {!! Form::label('roles', 'Perfil:') !!}
    {!! Form::select('roles[]', \Spatie\Permission\Models\Role::all()->pluck('name','name'), isset($users->roles) ? $users->roles->pluck('name') : null, ['class' => 'form-control chosen-select', 'multiple', 'placeholder' => "Por favor seleccione una opción"]) !!}
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

<!-- Name Field -->
<div class="form-group col-sm-12">
    <div class="form-group col-sm-6">
        {!! Form::label('signature_image', 'Subir Firma: (FORMATO .JPG)') !!}
        {!! Form::file('signature_image', null, ['class' => 'form-control']) !!}
    </div>
    
</div>
    @if(isset($users) && $users->signature_image != null)
        <div class="form-group col-sm-6">
            <img src="data:image/png;base64, {{ $users->signature_image }}" alt="Firma"/>
        </div>
    @endif
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancelar</a>
</div>
