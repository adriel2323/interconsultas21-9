<div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('department_id', 'Seleccione el sector') !!}
                    {!! Form::select('department_id', \App\Models\employeesModule\Department::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('employee_id', '¿Quién cumplirá las horas extras?') !!}
                    {!! Form::select('employee_id', \App\Models\employeesModule\Employee::all()->pluck('full_name','id'), null, ['class' => 'form-control chosen-select']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('covers_employee_id', '¿A que empleado cubrirá?') !!}
                    {!! Form::select('covers_employee_id', \App\Models\employeesModule\Employee::all()->pluck('full_name','id'), null, ['class' => 'form-control chosen-select']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('reason_id', '¿Por qué motivo?') !!}
                    {!! Form::select('reason_id', \App\Models\employeesModule\ExtraHoursReason::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select']) !!}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('from', 'Seleccione DESDE que fecha y hora') !!}
                    <input type="datetime-local" name="from" class="form-control" />

                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {!! Form::label('to', 'Seleccione HASTA que fecha y hora') !!}
                    <input type="datetime-local" name="to" class="form-control" />
                </div>
            </div>

            <!-- Extended Description Field -->
            <div class="form-group col-sm-12 col-lg-12">
                {!! Form::label('comments', 'Comentarios:') !!}
                {!! Form::textarea('comments', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Submit Field -->
            <div class="form-group col-sm-12">
                {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
                <a href="{!! route('webNews.index') !!}" class="btn btn-warning">Cancelar</a>
            </div>


        </div>
    </div>
</div>