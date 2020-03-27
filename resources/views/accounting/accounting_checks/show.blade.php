@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cheques
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    <div class=col-sm-12>
                        @include('accounting.accounting_checks.show_fields')
                    </div>
                    <a href="{!! route('accountingChecks.index') !!}" class="btn btn-primary">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
