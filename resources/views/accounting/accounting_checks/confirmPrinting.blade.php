@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Confirmación de impresión</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! url($buttonLink) !!}">Confirmar</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Banco</th>
                                <th>Número de Cheque</th>
                                <th>Fecha de emisión</th>
                                <th>Fecha de expiración</th>
                                <th>Páguese a</th>
                                <th>Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($checks as $check)
                                <tr>
                                    <td>{{$check->bankAccount->name}}</td>
                                    <td>{{$check->check_number}}</td>
                                    <td>{{\Carbon\Carbon::parse($check->emission_date)->format('d/m/Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($check->expiration_date)->format('d/m/Y')}}</td>
                                    <td>{{$check->pay_name}}</td>
                                    <td>{{number_format($check->amount, 2, ',', '.')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection

