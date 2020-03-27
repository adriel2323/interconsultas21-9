@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Anatomía patológica <br> Recibir Muestras</h1>
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                {!! Form::open(['url' => '/pathologicalAnatomy/receiveSamples']) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                {!! Form::label('code', 'Código:') !!}
                                {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => 'Código de la muestra']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                {!! Form::submit('Recibir Muestra', ['class' => 'btn btn-primary form-control']) !!}
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

