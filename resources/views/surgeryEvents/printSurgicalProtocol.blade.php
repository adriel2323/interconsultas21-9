<html>
    <head>
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="{{$_SERVER["DOCUMENT_ROOT"].'/vendor/bootstrap/css/bootstrap.min.css'}}">
        <meta charset="utf-8" />
        <title>Protocolo Quirurgico</title>
        <style>
            .page-break {
                page-break-after: always;
            }
            html {
                font-size: 8px;
            }

            .bordered {
                border-top: 1px solid black;
                border-left: 1px solid black;
                border-right: 1px solid black;
            }

            .centered {
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="row">
            <div class="col-sm-12">
                <div class="pull-left">
                    <img src="{{ $_SERVER["DOCUMENT_ROOT"]."/images/logoFundacion.jpg" }}" width="100px" height="100px">
                </div>
                <div class="pull-right">
                    <img src="{{ $_SERVER["DOCUMENT_ROOT"]."/images/logo.png" }}" width="100px" height="100px">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 centered">
                <h2>FUNDACIÓN NUESTRA SEÑORA DEL ROSARIO</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 centered">
                <h3>HOJA QUIRURGICA</h3>
            </div>
        </div><br><br>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Paciente:</b> {{mb_strtoupper($surgicalProtocol->surgeryEvent->EventData->patient_name)}} (DNI: {{$surgicalProtocol->surgeryEvent->EventData->patient_document}})</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Obra Social:</b> {{mb_strtoupper($surgicalProtocol->surgeryEvent->EventData->Os->name)}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Servicio:</b> {{mb_strtoupper($surgicalProtocol->service->name)}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Fecha:</b> {{\Carbon\Carbon::parse($surgicalProtocol->start_date)->format('d/m/Y')}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Hora de inicio:</b> {{\Carbon\Carbon::parse($surgicalProtocol->start_date)->format('H:i')}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Hora de Finalización:</b> {{\Carbon\Carbon::parse($surgicalProtocol->end_date)->format('H:i')}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Cirujano:</b> {{$surgicalProtocol->surgeryEvent->EventData->surgeon->name}}</h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Anestesista:</b>
                    @foreach($surgicalProtocol->surgeryEvent->anesthesists as $anesthesist)
                        {{ $anesthesist->name }} -
                    @endforeach
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Ayudantes:</b>
                    @foreach($surgicalProtocol->surgeryEvent->assistants as $assistant)
                        {{ $assistant->name }} -
                    @endforeach
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h4><b>Instrumentadores:</b>
                    @foreach($surgicalProtocol->surgeryEvent->instrumentists as $instrumentist)
                        {{ $instrumentist->name }} -
                    @endforeach
                </h4>
            </div>
        </div>
        @if(!empty($surgicalProtocol->perfusionDoctor))
            <div class="row">
                <div class="col-sm-12">
                    <h4><b>Perfusión:</b> {{$surgicalProtocol->perfusionDoctor->name}}</h4>
                </div>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-12">
                <h4><b>¿Se realiza biopsia?:</b>
                    {{ $surgicalProtocol->surgeryEvent->EventData->biopsy == 1 ? "SI" : "NO"  }}
                </h4>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 centered">
                <h4><b>Diagnóstico Preoperatorio</b></h4>
                <h4>{{mb_strtoupper($surgicalProtocol->pre_operatory_diagnostic)}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 centered">
                <h4><b>Procedimiento Quirurgico</b></h4>
                <h4>{{mb_strtoupper($surgicalProtocol->surgical_procedure)}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="centered">
                    <h3><b>Procedimiento Quirurgico</b></h3>
                </div>
                <h3>{!!str_replace("&NBSP;", " ", mb_strtoupper($surgicalProtocol->surgery_schema_description)) !!}</h3>
            </div>
        </div>


    </body>
</html>
