<html>
    <head>
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
        <style>
            .page-break {
                page-break-after: always;
            }
        </style>
    </head>
    <body>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <img src="{{ $_SERVER["DOCUMENT_ROOT"]."/images/logo.png" }}" width="100px" height="100px">
            </div>
            <div style="text-align: center;">
                <h3>{{$room->Descripcion}}</h3>
                <h3>Internados entre el {{ \Carbon\Carbon::parse($from)->format('d/m/Y') }} y {{ \Carbon\Carbon::parse($to)->format('d/m/Y') }}</h3>
            </div>
        </div>
    </div>
        <div class="row">
            <h4>Pacientes Admitidos directo a {{$room->Descripcion}}</h4>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th style="text-align: center;">Fecha Ingreso</th>
                        <th style="text-align: center;">Fecha Egreso</th>
                        <th style="text-align: center;">Sala</th>
                        <th style="text-align: center;">Mot. Ingreso</th>
                        <th style="text-align: center;">Médico</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($internments as $internment)
                        <tr>
                            <td>{{ $internment->Id }}</td>
                            <td>{{ \Carbon\Carbon::parse($internment->Fecha)->format('d/m/Y') }}</td>
                            @if($internment->EgresoFecha != null)
                                <td>{{ \Carbon\Carbon::parse($internment->EgresoFecha)->format('d/m/Y') }}</td>
                            @else
                                <td>Internado</td>
                            @endif
                            <td>{{ $internment->room->Descripcion }}</td>
                            <td>{{ $internment->entryReason->Descripcion }}</td>
                            <td>{{ $internment->doctor->ApellidoYNombre }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
<div class="page-break"></div>
        <div class="row">
            <h4>Pacientes Trasladados desde otra habitación a {{$room->Descripcion}}</h4>
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Id</th>
                        <th style="text-align: center;">Fecha Movimiento</th>
                        <th style="text-align: center;">Fecha Egreso</th>
                        <th style="text-align: center;">Sala</th>
                        <th style="text-align: center;">Mot. Ingreso</th>
                        <th style="text-align: center;">Médico</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movements as $movement)
                        <tr>
                            <td>{{ $movement->InternacionId }}</td>
                            <td>{{ \Carbon\Carbon::parse($movement->internment->Fecha)->format('d/m/Y') }}</td>
                            @if($movement->internment->EgresoFecha != null)
                                <td>{{ \Carbon\Carbon::parse($movement->internment->EgresoFecha)->format('d/m/Y') }}</td>
                            @else
                                <td>Internado</td>
                            @endif
                            <td>{{ $movement->room->Descripcion }}</td>
                            <td>{{ $movement->entryReason->Descripcion }}</td>
                            <td>{{ $movement->doctor->ApellidoYNombre }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
