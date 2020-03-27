@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Studies Types
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('studies_types.show_fields')
                    <a href="{!! route('studiesTypes.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
