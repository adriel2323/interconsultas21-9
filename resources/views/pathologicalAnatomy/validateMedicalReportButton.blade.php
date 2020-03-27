<div id="validationButtonDiv{{$row->id}}">
    @if(isset($row->medicalReport->medical_report))
        @if(is_null($row->medicalReport->validated_at))
            <button id="validateReportButton" title="Validar informe" class="btn btn-danger form-control btn-sm" type="button" onclick="validateMedicalReport({{$row->id}})"><i class="fa fa-remove"></i></button>
        @else
            <button id="unValidateReportButton" title="Desvalidar Informe" class="btn btn-success form-control btn-sm" type="button" onclick="unValidateMedicalReport({{$row->id}})"><i class="fa fa-check"></i></button>
        @endif
    @else
        No informado
    @endif
</div>
