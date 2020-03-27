@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cheques
        </h1>
    </section>
    <div class="content">

        <div class="clearfix"></div>
        @include('adminlte-templates::common.errors')
        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'accountingChecks.store']) !!}

                        @include('accounting.accounting_checks.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
