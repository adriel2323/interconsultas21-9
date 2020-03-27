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
            <h3>Listado de Médicos</h3>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="text-align: center;" width="25%">Nombre y Apellido</th>
                <th style="text-align: center;" width="5%">Matrícula</th>
                <th style="text-align: center;" width="5%">Corrige Matricula</th>
                <th style="text-align: center;" width="20%">Mail</th>
                <th style="text-align: center;" width="20%">Corrige Mail</th>
                <th style="text-align: center;" width="12%">Teléfono</th>
                <th style="text-align: center;" width="13%">Corrige teléfono</th>
            </tr>
            </thead>
            <tbody>
            @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->license }}</td>
                    <td></td>
                    <td>{{ $doctor->email }}</td>
                    <td></td>
                    <td>{{ $doctor->phone }}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
