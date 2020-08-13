function getTitle()
{
    var titleId = $('select[name="titles"]').val();

    if(titleId !== "") {
        $.ajax({
            url: "/pathologicalAnatomy/getMedicalReportTitle/" + titleId,
            type: 'get',
            success: function(result) {
                addContentToEditor("<b>"+result+"</b>");
                cleanTemplatesCategoriesSelect();
                $('#editor').focus();
            },
            error: function (data) {
                var exeption = data.responseJSON;
                addErrors(exeption.errors, '#results');
            }
        });
    }

}

function getTemplateCategory()
{
    var templateCategoryId = $('select[name="templateCategory"]').val();

    $.ajax({
        url: "/pathologicalAnatomy/getMedicalReportTemplates/" + templateCategoryId,
        type: 'get',
        success: function(result) {
            $('#templateSelect').html(result);
            $(".chosen-select").chosen({
                width: "100%",
                placeholder_text_single: "Seleccione una opción",
                no_results_text: "Sin resultados."
            });
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

function getTemplate()
{
    var templateId = $('select[name="template_id"]').val();

    if(templateId !== "") {
        $.ajax({
            url: "/pathologicalAnatomy/getMedicalReportTemplate/" + templateId,
            type: 'get',
            success: function(result) {
                addContentToEditor(result);
                cleanTemplateSelectDiv();

            },
            error: function (data) {
                var exeption = data.responseJSON;
                addErrors(exeption.errors, '#results');
            }
        });
    }

}

function cleanTemplateSelectDiv()
{
    $('#templateSelect').html("");
    cleanTemplatesCategoriesSelect();
}

function addContentToEditor(text)
{
    var currentText = editor.content.get();
    var newText = currentText + "<br>" + text + "<br>";
    editor.content.set(newText);
}

function cleanTemplatesCategoriesSelect()
{
    $('select[name="templateCategory"]').prop('selectedIndex', -1);
    $('select[name="templateCategory"]').trigger("chosen:updated");
}

function storePathologicalAnatomyMedicalProtocol(sampleId)
{

    var data = {
        _token: $('input[name="_token"]').val(),
        medical_report: editor.content.get()
    };

    $.ajax({
        url: "/pathologicalAnatomy/storeMedicalReport/" + sampleId,
        type: 'post',
        data: data,
        success: function(result) {
            location.href = result;
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

function updatePathologicalAnatomyMedicalProtocol(sampleId)
{
    var data = {
        _token: $('input[name="_token"]').val(),
        medical_report: editor.content.get()
    };

    $.ajax({
        url: "/pathologicalAnatomy/updateMedicalReport/" + sampleId,
        type: 'post',
        data: data,
        success: function(result) {
            window.open(result,"Imprimir informe patológico", "_blank");
            location.href = "/pathologicalAnatomy";
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

function validateMedicalReport(sampleId)
{
    $.ajax({
        url: "/pathologicalAnatomy/" + sampleId + "/validateMedicalReport",
        type: "POST",
        data: {_token: $("input[name='_token']").val()},
        success: function(result) {
            toastr.success('Informe validado exitosamente.');
            $('#validationButtonDiv' + sampleId).html('<button id="unValidateReportButton" title="Desvalidar Informe" class="btn btn-success form-control btn-sm" type="button" onclick="unValidateMedicalReport(' + sampleId + ')"><i class="fa fa-check"></i></button>');
            $('#setBillingCodesDiv' + sampleId).html('<button id="billingCodes" type="button" class="btn btn-sm btn-warning form-control">Informe validado</button>');
            $('#medicalReportButtonDiv' + sampleId).html('<div class="form-group"><a target="_blank" title="Descargar informe" type="button" class="btn btn-warning" href="/pathologicalAnatomy/printMedicalReport/' + sampleId + '"><i class="fa fa-file-pdf-o"></i></a></div>');
        },
        error: function(data) {
            var exception = data.responseJSON;
            addErrors(exeption.errors);
        }
    });
}

function unValidateMedicalReport(sampleId)
{
    $.ajax({
        url: "/pathologicalAnatomy/" + sampleId + "/unValidateMedicalReport",
        type: "POST",
        data: {_token: $("input[name='_token']").val()},
        success: function(result) {
            toastr.warning('Se ha desvalidado el informe.');
            $('#validationButtonDiv' + sampleId).html('<button id="validateReportButton" title="Validar informe" class="btn btn-danger form-control btn-sm" type="button" onclick="validateMedicalReport(' + sampleId +')"><i class="fa fa-remove"></i></button>');
            $('#setBillingCodesDiv' + sampleId).html('<div class="form-group"><button id="billingCodes" type="button" class="btn btn-sm btn-warning form-control" title="Indicar Códigos de Facturación" ><i class="fa fa-usd"></i></button></div>');

            var currentHtml = $('#medicalReportButtonDiv' + sampleId).html();
            currentHtml += '<div class="form-group"><button title="Editar informe" type="button" class="btn btn-danger" onclick="editSampleMedicalReport(' + sampleId + ');return false;"><i class="fa fa-file-text-o"></i></button></div>';
            $('#medicalReportButtonDiv' + sampleId).html(currentHtml);
        },
        error: function(data) {
            var exception = data.responseJSON;
            addErrors(exeption.errors);
        }
    });
}

function papanicolausTemplateModal()
{
    $.ajax({
        url: "/pathologicalAnatomy/PapanicolaouDialogTemplate",
        type: "GET",
        success: function(result) {
            dialog = bootbox.dialog({
                backdrop  : "static",
                title: '<h3>Informe de Papanicolaou.</h3>',
                onEscape: true,
                message: result,
                size: 'large',
                class: "bounceIn",
                buttons: {
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    },
                    noclose: {
                        label: 'Guardar',
                        className: 'btn-warning',
                        callback: function() {
                            writePapanicolaouReport();
                        }
                    }
                }
            }).init( function() {

                    $(".chosen-select").chosen({
                        width: "100%",
                        placeholder_text_single: "Seleccione una opción",
                        no_results_text: "Sin resultados."
                    });
            });
        },
        error: function(data) {
            var exception = data.responseJSON;
            addErrors(exeption.errors);
        }
    });
}

function writePapanicolaouReport()
{
    var templateId;
    for(var i = 1; i<14 ; i++) {
        templateId = $('select[name="category' + i +'"]').val();
        if(i == 13)
            addContentToEditor("<b><u>Diagnóstico</u</b>");
        if(templateId !== "")
            getTemplateDescription(templateId);
    }
}

function getTemplateDescription(templateId)
{
    $.ajax({
        url: "/pathologicalAnatomy/getPapanicolaouTemplateDescription/" + templateId,
        type: "GET",
        async: false,
        success: function(result) {
            addContentToEditor(result);
        },
        error: function(data) {
            var exception = data.responseJSON;
            addErrors(exeption.errors);
        }
    });
}

function addSignature()
{
    var html = "<div style='text-align: right'><img src='/images/FirmaBrunas.png' width='300px' height='300px' /></div>";

    var currentText = editor.content.get();
    var newText = currentText + "<br>" + html + "<br>";
    editor.content.set(newText);
}