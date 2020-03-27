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
            <h3>Pacientes atendidos en {{$speciality->Descripcion}}</h3>
            <strong>Desde {{ \Carbon\Carbon::parse($from)->format('d/m/Y') }} hasta {{ \Carbon\Carbon::parse($to)->format('d/m/Y') }}</strong>
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
                <th>Obra Social</th>
            </tr>
            </thead>
            <tbody>
            @foreach($studies as $study)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($study->IMG_TURNO_FECHA)->format('d/m/Y') }}</td>
                    <td>{{ $study->patient->apellido }}</td>
                    <td>{{ $study->os->Descripcion }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
