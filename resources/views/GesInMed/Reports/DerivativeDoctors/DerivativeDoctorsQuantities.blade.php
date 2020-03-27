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
                <h3>Cantidad de Pacientes derivados a imágenes por el médico {{ $doctor->MD_MEDICO }}</h3>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="text-align: center;">Obra social</th>
                        <th>Tipo de Estudio</th>
                        <th style="text-align: center;">Cantidad</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($derivatives as $derivative)
                        <tr>
                            <th>{{$derivative['os']}}</th>
                            <th>{{$derivative['speciality']}}</th>
                            <th>{{$derivative['quantity']}}</th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
