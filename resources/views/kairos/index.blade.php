@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Kairos</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row col-sm-12">
                    @include('kairos.search')
                </div>

                <div class="row col-sm-12">
                    <div id="queryResponse"></div>
                </div>


            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection