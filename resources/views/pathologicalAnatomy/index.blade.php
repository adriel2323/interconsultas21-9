@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Anatomía patológica</h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <table class="table table-striped" id="pathologicalAnatomySamplesTable">
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('/js/PathologicalAnatomy/PADatatable.js') !!}
@endsection

