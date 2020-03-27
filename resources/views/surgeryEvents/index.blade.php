@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Calendario Cirugía</h1>
        <h1 class="pull-right">
            <button class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="create_surgery_event();">Nuevo Registro</button>
        </h1>
    </section>

    <div class="content">

        <div id='flash-container' class='flash-container'></div>
        <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row col-sm-12">

                    <input type="hidden" value="{{csrf_token()}}" id="_token" />
                    {!! $calendar->calendar() !!}
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="resultado"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! $calendar->script() !!}

    <script>
        document.addEventListener("contextmenu", function(e) {
            e.preventDefault();
        }, false);
    </script>
@endsection