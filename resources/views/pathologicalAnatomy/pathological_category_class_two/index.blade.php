@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Anatomía Patológica - Categorías Nivel II</h1>
        <h1 class="pull-right">
        @can('pathologyCategoryClassTwo.create')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('pathologicalCategoryClassTwo.create') !!}">Nuevo registro</a>
        @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('pathologicalAnatomy.pathological_category_class_one.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

