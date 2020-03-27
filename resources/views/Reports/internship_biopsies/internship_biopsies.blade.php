<html>
<head>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
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
            <h3>Listado de Biopsias de Internados</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;">Nro. Biopsia</th>
                <th style="text-align: center;">F. Cirugía</th>
                <th style="text-align: center;">DNI del Paciente</th>
                <th style="text-align: center;">Nombre del Paciente</th>
                <th style="text-align: center;">T. de Biopsia</th>
                <th style="text-align: center;">Médico Actuante</th>
                <th style="text-align: center;">O.S</th>
                <th style="text-align: center;">Fecha de Entrega</th>
                <th style="text-align: center;">Patólogo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($biopsies as $biopsy)
                <tr>
                    <td>{{ $biopsy->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($biopsy->created_at)->format('d/m/Y') }}</td>
                    <td>{{ $biopsy->patient_document }}</td>
                    <td>{{ $biopsy->patient_name }}</td>
                    <td>{{ $biopsy->biopsy_type->name }}</td>
                    @if(isset($biopsy->doctor))
                        <td>{{ $biopsy->doctor->name }}</td>
                    @else
                        <td></td>
                    @endif
                    @if(isset($biopsy->os))
                        <td>{{ $biopsy->os->name }}</td>
                    @else
                        <td></td>
                    @endif
                    <td>{{ \Carbon\Carbon::parse($biopsy->delivery_date)->format('d/m/Y') }}</td>
                    @if(isset($biopsy->patologist))
                        <td>{{ $biopsy->patologist->name }}</td>
                    @else
                        <td></td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
