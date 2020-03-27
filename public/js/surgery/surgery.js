/**
 * Created by Bruno Contartese on 05/11/18.
 */
var SlickFlash;
var dialog;
var date;
var editor;

SlickFlash = (function() {
    var generate_html;

    function SlickFlash() {
        $('.slick-flash').remove();
    }

    SlickFlash.prototype.warning = function(msg) {
        return generate_html('Alerta!', msg);
    };

    SlickFlash.prototype.information = function(msg) {
        return generate_html('Info:', msg);
    };

    SlickFlash.prototype.success = function(msg) {
        return generate_html('Éxito!', msg);
    };

    SlickFlash.prototype.error = function(msg) {
        return generate_html('Error!', msg);
    };

    generate_html = function(type, msg) {
        var container, content, line, msg_body, msg_type;
        container = $('<div>');
        content = $('<div>');
        msg_type = $('<span>');
        msg_body = $('<span>');
        line = $('<div>');
        msg_type.text(type);
        msg_body.text(msg);
        container.addClass("slick-flash");
        container.addClass(type);
        content.addClass("message-content");
        msg_type.addClass('message-type');
        msg_body.addClass('message-body');
        line.addClass('line');
        content.appendTo(container);
        msg_type.appendTo(content);
        msg_body.appendTo(content);
        line.appendTo(container);
        return $("body").append(container);
    };

    return SlickFlash;

})();

(function($) {
    return $.extend({
        slickFlash: function(msg_type, msg) {
            var sf;
            sf = new SlickFlash;
            switch (msg_type) {
                case 'warning':
                    return sf.warning(msg);
                case 'information':
                    return sf.information(msg);
                case 'success':
                    return sf.success(msg);
                case 'error':
                    return sf.error(msg);
            }
        }
    });
})(jQuery);

function dragEvent(event)
{
    var resourceId = event.resourceId;

    var start = event.start._d;

    var end = event.end._d;

    var color = event.color;

    var data = {
        id: event.id,
        resourceId: resourceId,
        start: moment(start).format('Y/M/D HH:mm'),
        end: moment(end).format('Y/M/D HH:mm'),
        color: color,
        _token: $('input[name="_token"]').val(),
    };

    window.setTimeout(function() {
        $(".slick-flash").removeClass("slick-flash");
    }, 3000);

    $.ajax({
        url: "/surgery/dragEvent",
        data: data,
        type: 'post',
        success: function(result) {
            $.slickFlash("success", "Evento actualizado.");
        },
        error: function (data) {
            window.location.reload(true);
        }
    });
}

function getEventInfo(eventId)
{
    $.ajax({
        url: "/surgery/getEventInfo/" + eventId,
        type: 'get',
        success: function(result) {
            dialog = bootbox.dialog({
                title: '<h2>Información de la cirugía</h2>',
                onEscape: true,
                message: result,
                size: 'large',
                class: "bounceIn",
                buttons: {
                    delete: {
                        label: 'Borrar',
                        className: 'btn-danger',
                        callback: function() {
                            var response = destroyEvent();
                            return false;
                        }
                    },
                    noclose: {
                        label: 'Actualizar datos',
                        className: 'btn-warning',
                        callback: function() {
                            var response = update_surgery_event();
                            return false;
                        }
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    }
                }
            }).init( function() {
                $(".chosen-select").chosen({
                    width: "100%",
                    o_results_text: "No se han encontrado resultados",
                    placeholder_text_single: "Seleccione una opción",
                    placeholder_text_multiple: "Seleccione las opciones"
                });
            });
        },
        error: function (xhr, ajaxOptions, thrownError) {

        }
    });
}

function create_surgery_event(date = null, resourceId = null)
{
    var route;

    route = "/surgery/create";

    if(date !== null) {
        route = "/surgery/create/" + date + "/" + resourceId;
    }

    $.ajax({
        url: route,
        type: 'get',
        success: function(result) {

             dialog = bootbox.dialog({
                 backdrop  : "static",
                title: '<h3>Nuevo turno para cirugía. (Por favor verifique que el tipo de cirugía esté cargado antes de cargar todos los datos).</h3>',
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
                            var response = save_surgery_event();
                            return false;
                        }
                    }
                },
            }).init( function() {
                $(".chosen-select").chosen({
                    width: "100%",
                    o_results_text: "No se han encontrado resultados",
                    placeholder_text_single: "Seleccione una opción",
                    placeholder_text_multiple: "Seleccione las opciones"
                });
            });
        },
        error: function (xhr, ajaxOptions, thrownError) {

        }
    });
}

function save_surgery_event()
{
    var start_date = $('input[name="start_date"]').val();
    var end_date = $('input[name="end_date"]').val();
    var room_id = $('select[name="room_id"]').val();
    var dni = $('input[name="dni"]').val();
    var name = $('input[name="name"]').val();
    var os_id = $('select[name="os_id"]').val();
    var surgeon_id = $('select[name="surgeon_id"]').val();
    var surgery_type_id = $('select[name="surgery_type_id"]').val();
    var assistants_ids = $('select[name="assistants_ids"]').val();
    var comments = $('textarea[name="comments"]').val();
    var resource_id = $('select[name="resource_id"]').val();
    var biopsy = 0;
    var transitoryCheckIn = 0;
    var localAnesthesia = 0;
    var sedation = 0;
    var anesthesists = $('select[name="anesthesists"]').val();
    var x_ray_specialist_needed = 0;
    var nurses = $('select[name="nurses"]').val();
    var instrumentists = $('select[name="instrumentists"]').val();
    var rx_specialists = $('select[name="rx_specialists"]').val();
    var originRoomId = $('select[name="origin_room_id"]').val();

    if(document.getElementById("biopsy").checked === true) {
        biopsy = 1;
    }

    if(document.getElementById("biopsy").checked === true) {
        biopsy = 1;
    }

    if(document.getElementById("transitory_check_in").checked === true) {
        transitoryCheckIn = 1;
    }

    if(document.getElementById("local_anesthesia").checked === true) {
        localAnesthesia = 1;
    }

    if(document.getElementById("sedation").checked === true) {
        sedation = 1;
    }

    if(document.getElementById("x_ray_specialist_needed").checked === true) {
        x_ray_specialist_needed = 1;
    }

    var data = {
        _token: $('input[name="_token"]').val(),
        start_date: start_date,
        name: name,
        end_date: end_date,
        room_id: room_id,
        dni: dni,
        os_id: os_id,
        surgeon_id: surgeon_id,
        surgery_type_id: surgery_type_id,
        assistants_ids: assistants_ids,
        comments: comments,
        resource_id: resource_id,
        biopsy: biopsy,
        transitoryCheckIn: transitoryCheckIn,
        sedation: sedation,
        localAnesthesia: localAnesthesia,
        anesthesists: anesthesists,
        nurses: nurses,
        rx_specialists: rx_specialists,
        instrumentists: instrumentists,
        x_ray_specialist_needed: x_ray_specialist_needed,
        origin_room_id: originRoomId

    };

    $.ajax({
        url: "/surgery/store",
        async: false,
        type: 'post',
        data: data,
        success: function(result) {
            window.location.reload(true);
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors,'#resultadoModal');
        }
    });
}

function update_surgery_event()
{
    var id = $('input[name="id"]').val();
    var start_date = $('input[name="start_date"]').val();
    var end_date = $('input[name="end_date"]').val();
    var room_id = $('select[name="room_id"]').val();
    var dni = $('input[name="dni"]').val();
    var name = $('input[name="name"]').val();
    var os_id = $('select[name="os_id"]').val();
    var surgeon_id = $('select[name="surgeon_id"]').val();
    var surgery_type_id = $('select[name="surgery_type_id"]').val();
    var assistants_ids = $('select[name="assistants_ids"]').val();
    var comments = $('textarea[name="comments"]').val();
    var resource_id = $('select[name="resource_id"]').val();
    var biopsy = 0;
    var transitoryCheckIn = 0;
    var localAnesthesia = 0;
    var sedation = 0;
    var anesthesists = $('select[name="anesthesists"]').val();
    var x_ray_specialist_needed = 0;
    var nurses = $('select[name="nurses"]').val();
    var instrumentists = $('select[name="instrumentists"]').val();
    var rx_specialists = $('select[name="rx_specialists"]').val();
    var originRoomId = $('select[name="origin_room_id"]').val();

    if(document.getElementById("biopsy").checked === true) {
        biopsy = 1;
    }

    if(document.getElementById("transitory_check_in").checked === true) {
        transitoryCheckIn = 1;
    }

    if(document.getElementById("local_anesthesia").checked === true) {
        localAnesthesia = 1;
    }

    if(document.getElementById("sedation").checked === true) {
        sedation = 1;
    }

    if(document.getElementById("x_ray_specialist_needed").checked === true) {
        x_ray_specialist_needed = 1;
    }

    var data = {
        _token: $('input[name="_token"]').val(),
        id: id,
        start_date: start_date,
        name: name,
        end_date: end_date,
        room_id: room_id,
        dni: dni,
        os_id: os_id,
        surgeon_id: surgeon_id,
        surgery_type_id: surgery_type_id,
        assistants_ids: assistants_ids,
        comments: comments,
        resource_id: resource_id,
        biopsy: biopsy,
        transitoryCheckIn: transitoryCheckIn,
        sedation: sedation,
        localAnesthesia: localAnesthesia,
        anesthesists: anesthesists,
        nurses: nurses,
        rx_specialists: rx_specialists,
        instrumentists: instrumentists,
        x_ray_specialist_needed: x_ray_specialist_needed,
        origin_room_id: originRoomId

    };

    $.ajax({
        url: "/surgery/update",
        async: false,
        type: 'post',
        data: data,
        success: function(result) {
            window.location.reload(true);
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors,'#resultadoModal');
        }
    });
}


function changeEventStatus(statusId)
{
    var id = $('input[name="id"]').val();
    var data = {
        _token: $('input[name="_token"]').val(),
        id: id,
        status_id: statusId
    };

    $.ajax({
        url: "/surgery/changeEventStatus",
        type: 'post',
        data: data,
        success: function(result) {
            $.slickFlash("success", "Evento actualizado.");
            window.location.reload(true);
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, "#changeEventStatusErrors");
        }
    });
}

function destroyEvent()
{
    var event_id = $('input[name="id"]').val();

    var data = {
        _token: $('input[name="_token"]').val(),
        event_id: event_id,
    };

    bootbox.dialog({
        title: '<h2>Eliminar Turno</h2>',
        onEscape: true,
        message: '<h1 style="color: red;">¿Está seguro de eliminar el evento?</h1>',
        size: 'large',
        class: "bounceIn",
        buttons: {
            cancel: {
                label: 'Cancelar',
                className: 'btn-success'
            },
            noclose: {
                label: 'Eliminar',
                className: 'btn-danger',
                callback: function() {

                    $.ajax({
                        url: "/surgery/destroy",
                        type: 'post',
                        data: data,
                        success: function(result) {
                            window.location.reload(true);
                        },
                        error: function (data) {
                            var exeption = data.responseJSON;
                            addErrors(exeption.errors);
                        }
                    });

                }
            }
        }
    });
}

function updateEndDate()
{
    var start_date = $('input[name="start_date"]').val();

    start_date = moment(start_date).add(1,'hour').format('YYYY-MM-DDTHH:mm');
    
    var end_date = $('input[name="end_date"]').val(start_date);
}

function saveComments()
{
    var id = $('input[name="id"]').val();

    var comments = $('textarea[name="comments"]').val();

    var data = {
        _token: $('input[name="_token"]').val(),
        id: id,
        comments: comments
    };

    $.ajax({
        url: "/surgery/updateComments",
        async: false,
        type: 'post',
        data: data,
        success: function(result) {
            window.location.reload(true);
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors,'#resultadoModal');
        }
    });
}


function updateEventData()
{

    var startDate = $('input[name="start_date"]').val();
    var endDate = $('input[name="end_date"]').val();
    var originRoomId = $('select[name="origin_room_id"]').val();
    var roomId = $('select[name="room_id"]').val();
    var resourceId = $('select[name="resource_id"]').val();
    var id = $('input[name="id"]').val();
    var transitoryCheckIn = 0;

    if(document.getElementById("transitory_check_in").checked === true) {
        transitoryCheckIn = 1;
    }

    var data = {
        _token: $('input[name="_token"]').val(),
        start_date: startDate,
        end_date: endDate,
        origin_room_id: originRoomId,
        room_id: roomId,
        resource_id: resourceId,
        transitory_check_in: transitoryCheckIn
    };

    $.ajax({
        url: "/surgery/updateEventData/" + id,
        type: 'post',
        data: data,
        success: function(result) {
            window.location.reload(true);
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors,'#updateEventDataErrors');
        }
    });
}

function updatePatientData()
{

    var dni = $('input[name="dni"]').val();
    var name = $('input[name="name"]').val();
    var osId = $('select[name="os_id"]').val();
    var id = $('input[name="id"]').val();

    var data = {
        _token: $('input[name="_token"]').val(),
        dni: dni,
        name: name,
        os_id: osId
    };

    $.ajax({
        url: "/surgery/updatePatientData/" + id,
        type: 'post',
        data: data,
        success: function(result) {
            window.location.reload(true);
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors,'#updatePatientDataErrors');
        },
    });
}

function updateSurgeryData()
{

    var surgeonId = $('select[name="surgeon_id"]').val();
    var assistantsIds = $('select[name="assistants_ids"]').val();
    var surgeryTypeId = $('select[name="surgery_type_id"]').val();
    var biopsy = 0;
    var localAnesthesia = 0;
    var sedation = 0;
    var x_ray_specialist_needed = 0;
    var anesthesistsIds = $('select[name="anesthesists"]').val();
    var nursesIds = $('select[name="nurses"]').val();
    var instrumentistsIds = $('select[name="instrumentists"]').val();
    var rxSpecialistsIds = $('select[name="rx_specialists"]').val();
    var id = $('input[name="id"]').val();

    if(document.getElementById("biopsy").checked === true) {
        biopsy = 1;
    }

    if(document.getElementById("local_anesthesia").checked === true) {
        localAnesthesia = 1;
    }

    if(document.getElementById("sedation").checked === true) {
        sedation = 1;
    }

    if(document.getElementById("x_ray_specialist_needed").checked === true) {
        x_ray_specialist_needed = 1;
    }


    var data = {
        _token: $('input[name="_token"]').val(),
        surgeon_id: surgeonId,
        assistants_id: assistantsIds,
        surgery_type_id: surgeryTypeId,
        anesthesists: anesthesistsIds,
        nurses: nursesIds,
        instrumentists: instrumentistsIds,
        rx_specialists: rxSpecialistsIds,
        biopsy: biopsy,
        local_anesthesia: localAnesthesia,
        sedation: sedation,
        x_ray_specialist_needed: x_ray_specialist_needed,
    };

    $.ajax({
        url: "/surgery/updateSurgeryData/" + id,
        type: 'post',
        data: data,
        success: function(result) {
            window.location.reload(true);
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors,'#updateSurgeryDataErrors');
        },
    });
}

