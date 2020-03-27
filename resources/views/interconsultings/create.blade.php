@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Interconsultas
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'interconsultings.store']) !!}

                        @include('interconsultings.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection