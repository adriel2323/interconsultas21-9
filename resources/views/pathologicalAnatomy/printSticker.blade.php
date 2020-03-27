<html>
    <head>
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
        <meta charset="UTF-8" />
        <style>
            .center {
                text-align: center;
            }
            .small {
                font-size: 15px;
            }
        </style>
    </head>
    <body>
        <div class="col-xs-12">
            <div class="center">
                <p class="small">Servicio de Anatomía Patológica</p>
            </div>
            <img class='center-block' src="data:image/png;base64,{{\Milon\Barcode\DNS1D::getBarcodePNG($code, "C128")}}" alt="barcode" />
            <div class="center">
                <p class="small">{{$code}}</p>
            </div>
        </div>

    </body>
</html>
