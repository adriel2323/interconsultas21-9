$(document).ready(function() {
    $('#pathologicalAnatomySamplesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/pathologicalAnatomy/pathologicalAnatomySamplesDatatable',
        columnDefs: [
            {
                targets: 0,
                data: 'created_at',
                name: 'created_at',
                title: 'Fecha',
                searchable: false
            },
            {
                targets: 1,
                data: 'department_id',
                name: 'department_id',
                title: 'Origen',
                searchable: false
            },
            {
                targets: 2,
                data: 'code',
                name: 'code',
                title: 'Código'
            },
            {
                targets: 3,
                data: 'patient_id',
                name: 'patient_id',
                title: 'Paciente'
            },
            {
                targets: 4,
                data: 'received_at',
                name: 'received_at',
                title: '¿Muestra Recibida?',
                searchable: false
            },
            {
                targets: 5,
                data: 'billingCodes',
                name: 'billingCodes',
                title: 'Códigos de Facturación',
                searchable: false
            },
            {
                targets: 6,
                data: 'categorize',
                name: 'categorize',
                title: 'Categorizar',
                searchable: false
            },
            {
                targets: 7,
                data: 'report',
                name: 'report',
                title: 'Informe',
                searchable: false
            },
            {
                targets: 8,
                data: 'validate_medical_report',
                name: 'validate_medical_report',
                title: 'Validar Informe',
                searchable: false
            },
            {
                targets: 9,
                data: 'actions',
                name: 'actions',
                title: 'Acciones',
                searchable: false
            }
        ],
        order: [0],
        language: {url: '/css/datatables/spanish.json'}
    });
});

function categoriesModal(pathologicalAnatomySampleId)
{
    $.ajax({
        url: "/pathologicalAnatomy/setCategoriesModal/" + pathologicalAnatomySampleId,
        type: 'get',
        success: function(result) {
            var dialog = bootbox.confirm({
                message: result,
                className: 'modal40',
                buttons: {
                    confirm: {
                        label: 'Aceptar',
                        className: 'btn-success'
                    },
                    cancel: {
                        label: 'Cancelar',
                        className: 'btn-danger'
                    }
                },
                callback: function (result) {
                    if(result) {
                        setCategories(pathologicalAnatomySampleId);
                        return false;
                    }
                }
            });
            $(".chosen-select").chosen({
                width: '100%'
            });

        },
        error: function (data) {
            console.log(data);
        }
    });

}

function setCategories(sampleId)
{
    var pathological_category_class_one_id = false;
    var pathological_category_class_two_id = false;
    var pathological_category_class_three_id = false;
    var pathological_category_class_four_id = false;

    pathological_category_class_one_id = $('select[name="pathology_category_class_one_id"]').val();
    pathological_category_class_two_id = $('select[name="pathology_category_class_two_id"]').val();
    pathological_category_class_three_id = $('select[name="pathology_category_class_three_id"]').val();
    pathological_category_class_four_id = $('select[name="pathology_category_class_four_id"]').val();

    var data = {
        _token: $('input[name="_token"]').val(),
        pathology_category_class_one_id: pathological_category_class_one_id,
        pathology_category_class_two_id: pathological_category_class_two_id,
        pathology_category_class_three_id: pathological_category_class_three_id,
        pathology_category_class_four_id: pathological_category_class_four_id
    };

    $.ajax({
        url: "/pathologicalAnatomy/setCategories/" + sampleId,
        type: 'post',
        data: data,
        success: function(result) {
            location.href = "/pathologicalAnatomy";
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

function receiveSample(sampleId)
{
    $.ajax({
        url: "/pathologicalAnatomy/receiveSample/" + sampleId,
        type: 'post',
        data: data,
        success: function(result) {
            location.href = "/pathologicalAnatomy";
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}