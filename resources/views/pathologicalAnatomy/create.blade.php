@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Ingreso de Muestra Patológica</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div id="resultado"></div>

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('pathologicalAnatomy.fields')
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('/js/PathologicalAnatomy/create.js') !!}
@endsection