@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Anatomía patológica - Categorías Nivel III
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'pathologicalCategoryClassThree.store']) !!}

                        @include('pathologicalAnatomy.pathological_category_class_three.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
