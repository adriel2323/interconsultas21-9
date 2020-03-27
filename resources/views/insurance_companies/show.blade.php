@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Compañías de ART
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('insurance_companies.show_fields')
                    <a href="{!! route('insuranceCompanies.index') !!}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
