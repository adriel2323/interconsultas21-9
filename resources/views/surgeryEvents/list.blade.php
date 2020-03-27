@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Listado de Cirugías</h1>
        <h1 class="pull-right">
            <button class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="create_surgery_event();">Nuevo Registro</button>
        </h1>
    </section>

    <div class="content">
        <div class="row">
            @include('adminlte-templates::common.errors')
            <div id='flash-container' class='flash-container'></div>
            <div class="clearfix"></div>

            @include('flash::message')

            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group col-md-3">
                        {!! Form::label('date', 'Seleccione una fecha:') !!}
                        {!! Form::date('date', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group col-md-3">
                        <label></label>
                        <button type="button" class="btn btn-primary form-control" onclick="reloadDataTable();">Actualizar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="box box-primary">
                <div class="box-body">
                    <div class="row col-sm-12">
                        <div class="table-responsive">
                            <table id="surgeryEvents" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre y Apellido</th>
                                    <th>Quirófano N°</th>
                                    <th>Estado</th>
                                    <th>Tipo de Cirugía</th>
                                    <th>Obra Social</th>
                                    <th>Cirujano</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="resultado"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection