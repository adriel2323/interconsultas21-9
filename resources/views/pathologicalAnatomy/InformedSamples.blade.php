@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Muestras de AP informadas</h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table class="table table-striped" id="informedPathologicalAnatomySamplesTable">
                            <thead>
                                <tr>
                                    <th>Fecha de informe</th>
                                    <th>Apellido y nombre</th>
                                    <th>Fecha de validación</th>
                                    <th>Validado por</th>
                                    <th>Descargar reporte</th>
                                </tr>
                            </thead>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('/js/PathologicalAnatomy/informedPASamples.js') !!}
@endsection

