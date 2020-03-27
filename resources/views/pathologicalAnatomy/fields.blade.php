<div class="row">
    <div class="col-md-4">
        {!! Form::label('patient_document', 'Paciente') !!}
        <div class="form-inline">
            {!! Form::text('patient_document', null, ['class' => 'form-control', 'placeholder' => 'DNI del Paciente']) !!}
            <button name="search" class="btn btn-warning form-control" type="button" onclick="searchPatient();return false;"><i class="fa fa-search"></i></button>
        </div>
    </div>
</div>

<br>
@include('GesInMed.Patients.table')
<br>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('institution_id', 'Institución') !!}
            {!! Form::select('institution_id', \App\Models\Institutions\Institution::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione una Institución']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('department_id', 'Departamento (Si corresponde)') !!}
            {!! Form::select('department_id', \App\Models\Department::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un departamento']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('biopsy_type_id', 'Tipo de estudio') !!}
            {!! Form::select('biopsy_type_id', \App\Models\biopsies_types::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un departamento']) !!}
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            {!! Form::label('doctor_id', 'Médico Derivante') !!}
            {!! Form::select('doctor_id', \App\Models\Doctor::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un médico']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        <button type="button" class="btn btn-success" onclick="checkRequiredFields();">Guardar</button>
        <a href="{!! route('internshipBiopsies.index') !!}" class="btn btn-default">Cancelar</a>
    </div>
</div>