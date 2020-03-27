<html>
<head>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
    <title>Informe-{{ $medicalReport->pathologicalAnatomyLaboratorySample->code }}</title>
    <meta charset="UTF-8" />
    <style>
        .page-break {
            page-break-after: always;
        }
        html {
            font-size: 8px;
            margin-left: 30px;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-sm-12">
        <div class="pull-right">
            <img src="{{ $_SERVER["DOCUMENT_ROOT"]."/images/logo.png" }}" width="100px" height="100px">
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <h1>Fundación Nuestra. Señora del Rosario</h1>
            <h3>Departamento de Anatomía Patológica</h3>
	    <h3>Muestra {{ $medicalReport->pathologicalAnatomyLaboratorySample->code }} </h3>
        </div>
    </div>
<br>
    <div class="row">
        {!! $medicalReport->medical_report !!}
    </div>
</body>
</html>
