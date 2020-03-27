function isSurgicalProtocolCreated(EventId)
{
    var response = false;

    $.ajax({
        url: "/surgery/SurgicalProtocol/exists/" + EventId,
        type: 'get',
        async: false,
        success: function(result) {
            result = parseInt(result);
            if(result === 1) {
                if(isSugeryProtocolEditable(EventId)) {

                    editableSurgicalProtocolModal(EventId);

                } else {

                    nonEditableSurgicalProtocolModal(EventId);

                }

            } else {
                console.log("PROTOCOLO NO CREADO");
                createSurgicalProtocol(EventId);

            }

        },
        error: function (data) {

        }
    });

    return response;
}

function editableSurgicalProtocolModal(EventId)
{
    surgicalProtocolIsEditableModal(EventId);
}

function nonEditableSurgicalProtocolModal(EventId)
{
    window.open("/surgery/surgicalProtocol/printBySurgeryEventId/" + EventId, "_blank");
}

function createSurgicalProtocol(EventId)
{
      $.ajax({
         url: "/surgery/createSurgicalProtocol/" + EventId,
         type: 'get',
         success: function(result) {

             dialog = bootbox.dialog({
                 backdrop  : "static",
                 title: '<h3>Protocolo Quirúrgico.</h3>',
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
                             storeSurgicalProtocol(EventId);
                             return false;
                         }
                     }
                 }
             }).init( function() {

                 $(".chosenSelect").chosen({
                     width: "100%",
                 });

                 editor = textboxio.replace('#editor');

             });
         },
         error: function (data) {

         }
     });
}

function storeSurgicalProtocol(EventId)
{

    var surgery_schema_description = editor.content.get();
    var data = {
        _token: $('input[name="_token"]').val(),
        perfusion_specialist: $('select[name="perfusion_specialist"]').val(),
        service_id: $('select[name="service_id"]').val(),
        pre_operatory_diagnostic: $('input[name="pre_diagnostic"]').val(),
        surgical_procedure: $('input[name="surgical_procedure"]').val(),
        surgery_schema_description: surgery_schema_description,
        start_date: $('input[name="start_date"]').val(),
        end_date: $('input[name="end_date"]').val()
    };

    $.ajax({
        url: "/surgery/storeSurgicalProtocol/" + EventId,
        type: 'post',
        data: data,
        success: function(result) {
            window.open(result, "_blank");

            location.href = "/surgery";
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors,'#storeSurgicalProtocolErrors');
        }
    });

}



function isSugeryProtocolEditable(EventId)
{
    var isEditable = false;

    $.ajax({
        url: "/surgery/SurgicalProtocol/isEditable/" + EventId,
        type: 'get',
        async: false,
        success: function(result) {
            if(result == 1) {
                isEditable = true;
            }
        },
        error: function (data) {

        }
    });

    return isEditable;
}

function surgicalProtocolIsEditableModal(EventId)
{
    $.ajax({
        url: "/surgery/SurgicalProtocol/editableSurgicalProtocolModal/" + EventId,
        type: 'get',
        async: false,
        success: function(result) {
            bootbox.alert({
                message: result,
                className: 'modal30'
            });

        },
        error: function (data) {

        }
    });
}

function editSurgicalProtocol(EventId)
{
    $.ajax({
        url: "/surgery/SurgicalProtocol/editSurgicalProtocolModal/" + EventId,
        type: 'get',
        async: false,
        success: function(result) {
            bootbox.dialog({
                backdrop  : "static",
                title: '<h3>Editar Protocolo Quirúrgico.</h3>',
                onEscape: true,
                message: result,
                size: 'large',
                className: "bounceIn modal80",
                buttons: {
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    },
                    noclose: {
                        label: 'Guardar',
                        className: 'btn-warning',
                        callback: function() {
                            updateSurgicalProtocol(EventId);
                            return false;
                        }
                    }
                }
            }).init( function() {

                $(".chosenSelect").chosen({
                    width: "100%",
                });

                editor = textboxio.replace('#editor');

            });
        },
        error: function (data) {

        }
    });
}

function updateSurgicalProtocol(EventId)
{
    var surgery_schema_description = editor.content.get();

    var data = {
        _token: $('input[name="_token"]').val(),
        perfusion_specialist: $('select[name="perfusion_specialist"]').val(),
        service_id: $('select[name="service_id"]').val(),
        pre_operatory_diagnostic: $('input[name="pre_diagnostic"]').val(),
        surgical_procedure: $('input[name="surgical_procedure"]').val(),
        surgery_schema_description: surgery_schema_description,
        start_date: $('input[name="start_date"]').val(),
        end_date: $('input[name="end_date"]').val()
    };

    $.ajax({
        url: "/surgery/updateSurgicalProtocol/" + EventId,
        type: 'post',
        data: data,
        success: function (result) {
            window.open(result, "_blank");

            location.href = "/surgery";
        }
    });

}