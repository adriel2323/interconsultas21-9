@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Plantillas de informe de Anatomías Patológicas
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>

        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pathologicalAnatomyTemplates.store']) !!}

                        @include('pathologicalAnatomy.pathological_anatomy_templates.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
