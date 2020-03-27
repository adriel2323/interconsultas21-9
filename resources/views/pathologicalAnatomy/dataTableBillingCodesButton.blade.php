<div id="setBillingCodesDiv{{$row->id}}">
    @if(isset($row->medicalReport) && is_null($row->medicalReport->validated_at) || !isset($row->medicalReport))
        <div class="form-group">
            <button id="billingCodes" type="button" class="btn btn-sm btn-warning form-control" onclick="bringBillingCodesModal({{$row->id}});" title="Indicar Códigos de Facturación" ><i class='fa fa-usd'></i></button>
        </div>
    @else
        <button id="billingCodes" type="button" class="btn btn-sm btn-warning form-control">Informe validado</button>
    @endif
</div>
