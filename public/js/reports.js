function internshipBiopsiesByDate(documentType)
{
    $.ajax({
        url: "/helpers/BetweenDates",
        type: 'get',
        success: function (result) {
            bootbox.confirm({
                title: 'Introduzca los datos requeridos',
                message: result,
                class: "bounceIn",
                buttons: {
                    confirm: {
                        label: 'Aceptar',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {

                        var from = $('input[name="from"]').val();
                        var to = $('input[name="to"]').val();

                        window.open('/reports/InternshipBiopsies/' + documentType + '/' + from + '/' + to, '_blank');

                    } else {

                        bootbox.hideAll();

                    }
                }
            })
                .on("shown.bs.modal", function (e) {
                    $(".chosen-select").chosen();
                });
        }
    });
}

function surgeryEventsBetweenDates(documentType)
{
    $.ajax({
        url: "/helpers/BetweenDates",
        type: 'get',
        success: function(result) {
            bootbox.confirm({
                title: 'Introduzca los datos requeridos',
                message: result,
                className: "bounceIn",
                buttons: {
                    confirm: {
                        label: 'Aceptar',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {

                        var from = $('input[name="from"]').val();
                        var to = $('input[name="to"]').val();;

                        window.open('/reports/SurgeryEventsBetweenDates/' + documentType + '/' + from + '/' + to, '_blank');

                    } else {

                        bootbox.hideAll();

                    }
                }
            });
        }
    });
}

function surgeryEventsByDoctorBetweenDates(documentType)
{
    $.ajax({
        url: "/helpers/SurgeryEvents/byDoctorBetweenDates",
        type: 'get',
        success: function(result) {
            bootbox.confirm({
                title: 'Introduzca los datos requeridos',
                message: result,
                className: "bounceIn",
                animated: true,
                buttons: {
                    confirm: {
                        label: 'Aceptar',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {

                        var from = $('input[name="from"]').val();
                        var to = $('input[name="to"]').val();
                        var doctorId = $('select[name="doctor_id"]').val();

                        window.open('/reports/SurgeryEventsByDoctorBetweenDates/' + documentType + '/' + doctorId + "/" + from + '/' + to, '_blank');

                    } else {

                        bootbox.hideAll();

                    }
                }
            }).on("shown.bs.modal", function (e) {
                $(".chosen-select").chosen();
            });
        }
    });
}

function surgeryEventsWithXRay(documentType)
{
    window.open('/reports/SurgeryEventsWithXRay/' + documentType, '_blank');
}

function surgeryDateEventsBetweenDates(documentType)
{
    $.ajax({
        url: "/helpers/BetweenDates",
        type: 'get',
        success: function(result) {
            bootbox.confirm({
                title: 'Introduzca los datos requeridos',
                message: result,
                className: "bounceIn",
                buttons: {
                    confirm: {
                        label: 'Aceptar',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {

                        var from = $('input[name="from"]').val();
                        var to = $('input[name="to"]').val();;

                        window.open('/reports/SurgeryDateEventsBetweenDates/' + documentType + '/' + from + '/' + to, '_blank');

                    } else {

                        bootbox.hideAll();

                    }
                }
            });
        }
    });
}

function nonReceivedSamplesBetweenDates(documentType)
{
    axios.get("/helpers/BetweenDates")
    .then(function(result) {
        bootbox.confirm({
            title: 'Introduzca los datos requeridos',
            message: result.data,
            className: "bounceIn",
            buttons: {
                confirm: {
                    label: 'Aceptar',
                    className: 'btn-danger'
                },
                cancel: {
                    label: 'Cancelar',
                    className: 'btn-success'
                }
            },
            callback: function (result) {
                if (result) {

                    var from = $('input[name="from"]').val();
                    var to = $('input[name="to"]').val();;

                    window.open('/reports/nonReceivedPathologicalAnatomySamplesBetweenDates/' + documentType + '/' + from + '/' + to, '_blank');

                } else {

                    bootbox.hideAll();

                }
            }
        });
    });
}

function receivedNonReportedSamplesBetweenDates(documentType)
{
    axios.get("/helpers/BetweenDates")
        .then(function(result) {
            bootbox.confirm({
                title: 'Introduzca los datos requeridos',
                message: result.data,
                className: "bounceIn",
                buttons: {
                    confirm: {
                        label: 'Aceptar',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {

                        var from = $('input[name="from"]').val();
                        var to = $('input[name="to"]').val();;

                        window.open('/reports/receivedNonReportedPathologicalAnatomySamplesBetweenDates/' + documentType + '/' + from + '/' + to, '_blank');

                    } else {

                        bootbox.hideAll();

                    }
                }
            });
        });
}

function surgeryEventsWithXRayBetweenDates(documentType)
{
    $.ajax({
        url: "/helpers/BetweenDates",
        type: 'get',
        success: function (result) {
            bootbox.confirm({
                title: 'Introduzca los datos requeridos',
                message: result,
                class: "bounceIn",
                buttons: {
                    confirm: {
                        label: 'Aceptar',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {

                        var from = $('input[name="from"]').val();
                        var to = $('input[name="to"]').val();

                        window.open('/reports/SurgeryEventsWithXRayBetweenDates/' + documentType + '/' + from + '/' + to, '_blank');

                    } else {

                        bootbox.hideAll();

                    }
                }
            })
                .on("shown.bs.modal", function (e) {
                    $(".chosen-select").chosen();
                });
        }
    });
}