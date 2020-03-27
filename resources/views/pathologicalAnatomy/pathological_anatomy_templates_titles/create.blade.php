@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Categorías de Plantillas para Informes de Anatomías Patológicas
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'paTemplatesTitles.store']) !!}

                        @include('pathologicalAnatomy.pathological_anatomy_templates_titles.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
