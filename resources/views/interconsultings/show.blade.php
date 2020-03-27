@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Interconsultas
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('interconsultings.show_fields')
                </div>
                <div class="row" style="padding-left: 20px">
                    <a href="{!! route('interconsultings.index') !!}" class="btn btn-warning">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
