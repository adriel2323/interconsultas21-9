<html>
<head>
    <meta charset="utf-8" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
    <title>Cirugías.pdf</title>
    <style>
        thead { display: table-header-group }
        tfoot { display: table-row-group }
        tr { page-break-inside: avoid }
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
            <h3>Listado de cirugías agendadas entre el {{\Carbon\Carbon::parse($from)->format('d/m/Y')}} y el {{\Carbon\Carbon::parse($to)->format('d/m/Y')}}</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="text-align: center;">Fecha</th>
                    <th style="text-align: center;">Paciente</th>
                    <th style="text-align: center;">Obra social</th>
                    <th>Tipo de Cirugía</th>
                    <th>Cirujano</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
            @foreach($surgeries as $surgery)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($surgery->start_date)->format('d/m/Y H:i') }}</td>
                    <td>{{ mb_strtoupper($surgery->EventData->patient_name) }}</td>
                    <td>{{ mb_strtoupper($surgery->EventData->Os->name) }}</td>
                    <td>{{ mb_strtoupper($surgery->EventData->surgeryType->description) }}</td>
                    <td>{{ mb_strtoupper($surgery->EventData->surgeon->name) }}</td>
                    <td>{{ mb_strtoupper($surgery->status->name) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="page-break"></div>
<div class="row">
    <div class="col-sm-12">
        <h2>Estadísticas</h2>
        <div class="pull-left">
            <ul>
                <li><h3>Cantidad de cirugías en el período: {{ count($surgeries) }}</h3></li>
                @foreach($os as $row)
                    <li><b>Cantidad de cirugías de {{ mb_strtoupper($row['name']) }}: {{ $row['total'] }}</b></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</body>
</html>
