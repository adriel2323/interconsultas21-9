<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clínica UOM</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link rel="icon" type="image/png" href="/images/logo.png" />

        @include('layouts.css')

        @yield('css')
        <meta http-equiv="Refresh" content="300">
    </head>

    <body class="fullScreen">
    {{Form::hidden('nextPageUrl',$interconsultings->nextPageUrl(),['class' => 'form-control'])}}
    @if($interconsultings->hasMorePages())
        {{Form::hidden('hasMorePages',1,['class' => 'form-control'])}}
    @else
        {{Form::hidden('hasMorePages',0,['class' => 'form-control'])}}
    @endif
        <!-- Content Wrapper. Contains page content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-warning">
                        <div class="panel-title"><b><h2>Interconsultas</h2></b></div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="InterconsultingTable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>N° Habitación</th>
                                        <th>Médico Solicitante</th>
                                        <th>Servicio Solicitado</th>
                                        <th>Médico Solicitado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($interconsultings as $interconsulting)
                                        <tr>
                                            <td class="font20">{{\Carbon\Carbon::parse($interconsulting->created_at)->format('d/m/Y')}}</td>
                                            <td class="font20">{{$interconsulting->room->name}}</td>
                                            <td class="font20">{{$interconsulting->requester->name}}</td>
                                            <td class="font20">{{$interconsulting->service->name}}</td>
                                            <td class="font20">{{$interconsulting->requested->name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


        @include('layouts.js')
        <script>
            $(document).ready(function() {
               setTimeout(changePage,90000);
            });

            function changePage()
            {
                var hasMorePages = $('input[name="hasMorePages"]').val();
                console.log(hasMorePages);

                if(parseInt(hasMorePages) === 1) {
                    location.href = $('input[name="nextPageUrl"]').val();
                } else {
                    location.href = '/InterconsultingsFullScreen?page=1';
                }
            }
        </script>
    </body>
</html>