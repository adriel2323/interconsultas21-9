<html>
<head>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
    <title>CirugíasConArcoEnC.pdf</title>
    <meta charset="UTF-8" />
    <style>
        .page-break {
            page-break-after: always;
        }
        html {
            font-size: 8px;
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
        <h3>Listado de Cirugías con Arco en C entre {{ $from }} y {{ $to }}</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Finalización</th>
                    <th>N° Quirófano</th>
                    <th>Nombre del Paciente</th>
                    <th>Documento del Paciente</th>
                    <th>Cirujano</th>
                </tr>
            </thead>
            <tbody>
            @foreach($events as $surgery)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($surgery->start_date)->format('d/m/Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($surgery->end_date)->format('d/m/Y H:i') }}</td>
                    <td>{{ $surgery->surgeryRoom->name }}</td>
                    <td>{{ $surgery->EventData->patient_name }}</td>
                    <td>{{ $surgery->EventData->patient_document }}</td>
                    <td>{{ $surgery->EventData->surgeon->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <h3>Total de cirugías: <b>{{ count($events) }}</b></h3>
    </div>
</div>
</body>
</html>
