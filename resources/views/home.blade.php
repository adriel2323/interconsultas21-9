@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Principal</h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="panel panel-info">
                    <div class="panel-title">
                        <h2>Actualización 14/02/19</h2>
                    </div>
                    <div class="panel-body">

                        <p>En el día de la fecha se realizó una actualización importante.</p>
                        <p>Si llegan a encontrar un error, por favor comunicarse con el departamento de sistemas.</p>
                        <p>Muchas gracias.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

