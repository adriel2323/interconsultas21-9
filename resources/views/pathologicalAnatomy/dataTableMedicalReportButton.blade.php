<div id="medicalReportButtonDiv{{$row->id}}">
    @if(isset($row->medicalReport))
        <div class="form-group">
            <a target="_blank" title="Descargar informe" type='button' class='btn btn-warning' href="/pathologicalAnatomy/printMedicalReport/{{$row->id}}"><i class='fa fa-file-pdf-o'></i></a>
        </div>
        @if(isset($row->medicalReport) && is_null($row->medicalReport->validated_at) || !isset($row->medicalReport))
            <div class="form-group">
                <button title="Editar informe" type='button' class='btn btn-danger' onclick='editSampleMedicalReport({{$row->id}});return false;'><i class='fa fa-file-text-o'></i></button>
            </div>
        @endif
    @else
        <div class="form-group">
            <button {{is_null($row->received_at) ? 'disabled' : ''}} title="{{is_null($row->received_at) ? 'Muestra no recibida' : 'Informar'}}" type='button' class='btn btn-primary' onclick='makeSampleMedicalReport({{$row->id}});return false;'><i class='fa fa-file-text-o'></i></button>
        </div>
    @endif
</div>


