@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Consultas de Guardia
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('emergency_consultings.show_fields')
                    <a href="{!! route('emergencyConsultings.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
