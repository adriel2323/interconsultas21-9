@extends('layouts.app')

@section('content')
    <meta http-equiv="Refresh" content="60">

    <section class="content-header">
        <h1 class="pull-left">Interconsultas pendientes</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('doctor', 'Seleccione un Médico', ['class' => 'control-label']) !!}
                        {!! Form::select('doctor', \App\Models\Doctor::all()->pluck('name','id'), null, ['class' => 'form-control chosen-select', 'placeholder' => 'Seleccione un médico', 'onchange' => 'searchPendingsInterconsults();'])  !!}
                    </div>
                </div>

            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection