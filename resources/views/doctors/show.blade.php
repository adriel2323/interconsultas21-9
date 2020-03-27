@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Especialistas
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('doctors.show_fields')
                </div>
                <div class="row col-sm-12">
                    <a href="{!! route('doctors.index') !!}" class="btn btn-warning">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
