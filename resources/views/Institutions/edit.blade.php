@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editar Institución
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                    {!! Form::model($institution, ['route' => ['institutions.update', $institution->id], 'method' => 'patch']) !!}

                    @include('Institutions.fields')

                    {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection