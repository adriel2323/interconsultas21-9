<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="col-sm-12">
                <button class="btn btn-warning form-control" data-toggle="collapse" data-target="#biopsias" aria-expanded="true" aria-controls="collapseOne">
                    <div style="color: #fff;">Biopsias</div>
                </button>
            </h5>
        </div>

        <div id="biopsias" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="80%">Nombre de Reporte</th>
                            <th width="10%">Excel</th>
                            <th width="10%">PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Biopsias de Internados por fechas</strong></td>
                            <td><button type="button" class="btn btn-warning" onclick="internshipBiopsiesByDate('excel');"><i class="fa fa-file-excel-o"></i></button></td>
                            <td><button type="button" class="btn btn-warning" onclick="internshipBiopsiesByDate('pdf');"><i class="fa fa-file-pdf-o"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="col-sm-12">
                <button class="btn btn-warning form-control" data-toggle="collapse" data-target="#cirugias" aria-expanded="true" aria-controls="collapseOne">
                    <div style="color: #fff;">Cirugías</div>
                </button>
            </h5>
        </div>

        <div id="cirugias" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th width="80%">Nombre de Reporte</th>
                            <th width="10%">Excel</th>
                            <th width="10%">PDF</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Listado de Cirugías Realizadas entre Fechas</strong></td>
                            <td><button type="button" class="btn btn-warning" onclick="surgeryEventsBetweenDates('excel');"><i class="fa fa-file-excel-o"></i></button></td>
                            <td><button type="button" class="btn btn-warning" onclick="surgeryEventsBetweenDates('pdf');"><i class="fa fa-file-pdf-o"></i></button></td>
                        </tr>
                        <tr>
                            <td><strong>Listado de Cirugías Realizadas por médico entre fechas</strong></td>
                            <td><button disabled type="button" class="btn btn-warning" onclick="surgeryEventsByDoctorBetweenDates('excel');"><i class="fa fa-file-excel-o"></i></button></td>
                            <td><button type="button" class="btn btn-warning" onclick="surgeryEventsByDoctorBetweenDates('pdf');"><i class="fa fa-file-pdf-o"></i></button></td>
                        </tr>
                        <tr>
                            <td><strong>Listado de Cirugías Agendadas entre Fechas</strong></td>
                            <td><button disabled type="button" class="btn btn-warning" onclick="surgeryDateEventsBetweenDates('excel');"><i class="fa fa-file-excel-o"></i></button></td>
                            <td><button type="button" class="btn btn-warning" onclick="surgeryDateEventsBetweenDates('pdf');"><i class="fa fa-file-pdf-o"></i></button></td>
                        </tr>
                        <tr>
                            <td><strong>Listado de Cirugías con arco en C</strong></td>
                            <td><button type="button" class="btn btn-warning" onclick="surgeryEventsWithXRay('excel');"><i class="fa fa-file-excel-o"></i></button></td>
                            <td><button type="button" class="btn btn-warning" onclick="surgeryEventsWithXRay('pdf');"><i class="fa fa-file-pdf-o"></i></button></td>
                        </tr>
                        <tr>
                            <td><strong>Listado de Cirugías con arco en C entre Fechas</strong></td>
                            <td><button disabled type="button" class="btn btn-warning" onclick="surgeryEventsWithXRay('excel');"><i class="fa fa-file-excel-o"></i></button></td>
                            <td><button type="button" class="btn btn-warning" onclick="surgeryEventsWithXRayBetweenDates('pdf');"><i class="fa fa-file-pdf-o"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div id="accordion">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="col-sm-12">
                <button class="btn btn-warning form-control" data-toggle="collapse" data-target="#pathologicalAnatomy" aria-expanded="true" aria-controls="collapseOne">
                    <div style="color: #fff;">Anatomía Patológica</div>
                </button>
            </h5>
        </div>

        <div id="pathologicalAnatomy" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th width="80%">Nombre de Reporte</th>
                        <th width="10%">Excel</th>
                        <th width="10%">PDF</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Listado de muestras no recibidas</strong></td>
                        <td><button disabled type="button" class="btn btn-warning" onclick="nonReceivedSamplesBetweenDates('excel');"><i class="fa fa-file-excel-o"></i></button></td>
                        <td><button type="button" class="btn btn-warning" onclick="nonReceivedSamplesBetweenDates('pdf');"><i class="fa fa-file-pdf-o"></i></button></td>
                    </tr>
                    <tr>
                        <td><strong>Listado de muestras recibidas, no informadas</strong></td>
                        <td><a disabled type="button" class="btn btn-warning" ><i class="fa fa-file-excel-o"></i></a></td>
                        <td><a href="/reports/receivedNonReportedPathologicalAnatomySamplesBetweenDates/pdf" class="btn btn-warning" ><i class="fa fa-file-pdf-o"></i></a></td>
                    </tr>
                    <tr>
                        <td><strong>Códigos de diagnóstico</strong></td>
                        <td><a disabled type="button" class="btn btn-warning" ><i class="fa fa-file-excel-o"></i></a></td>
                        <td><a href="/reports/pathologicalAnatomy/diagnosticCodes" target="_blank" class="btn btn-warning" ><i class="fa fa-file-pdf-o"></i></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>