@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Cheques</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('accountingChecks.create') !!}">Nuevo registro</a>
           <button type="button" class="btn btn-warning pull-right" style="margin-top: -10px;margin-bottom: 5px" onclick="selectPrintingRanges();">Impresión de Cheques</button>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('accounting.accounting_checks.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

