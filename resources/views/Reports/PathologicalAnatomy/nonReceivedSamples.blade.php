<html>
<head>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
    <title>MuestrasNoRecibidas.pdf</title>
    <meta charset="UTF-8" />
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
            <h3>Listado de muestras no recibidas desde el {{ \Carbon\Carbon::parse($from)->format('d/m/Y') }} al {{ \Carbon\Carbon::parse($to)->format('d/m/Y')}}</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Fecha de carga</th>
                <th>Origen</th>
                <th>Código</th>
                <th>Paciente</th>
                <th>Hora de inicio de cirugía</th>
                <th>Hora de fin de cirugía</th>
                <th>Quirófano</th>
                <th>Cirujano</th>
            </tr>
            </thead>
            <tbody>
            @foreach($samples as $sample)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($sample->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ $sample->department->name }}</td>
                    <td>{{ $sample->code }}</td>
                    <td>{{ isset($sample->surgeryEvent) ? $sample->surgeryEvent->EventData->patient_name : "" }}</td>
                    <td>{{ isset($sample->surgeryEvent) ? \Carbon\Carbon::parse($sample->surgeryEvent->start_date)->format('d/m/Y H:i') : ""}}</td>
                    <td>{{ isset($sample->surgeryEvent) ? \Carbon\Carbon::parse($sample->surgeryEvent->end_date)->format('d/m/Y H:i') : ""}}</td>
                    <td>{{ isset($sample->surgeryEvent) ? $sample->surgeryEvent->surgeryRoom->name : ""}}</td>
                    <td>{{ isset($sample->surgeryEvent) ? $sample->surgeryEvent->EventData->surgeon->name : ""}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>Total de muestras no recibidas: {{ count($samples) }}</h3>
    </div>

</div>
</body>
</html>
