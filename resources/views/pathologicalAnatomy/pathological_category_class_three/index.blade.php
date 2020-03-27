@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Anatomía Patológica - Categorías Nivel III</h1>
        <h1 class="pull-right">
        @can('pathologyCategoryClassThree.create')
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('pathologicalCategoryClassThree.create') !!}">Nuevo registro</a>
        @endcan
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('pathologicalAnatomy.pathological_category_class_three.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

