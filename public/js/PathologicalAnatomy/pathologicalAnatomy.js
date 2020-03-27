function bringSecondLevelCategories()
{
    var firstLevelCategoryId = $('select[name="pathology_category_class_one_id"]').val();

    $.ajax({
        url: "/helpers/pathologicalCategoryClassOne/getChildCategories/" + firstLevelCategoryId,
        type: 'get',
        success: function(result) {
            $('#secondLevelCategoriesSelect').html(result);
            $('#thirdLevelCategoriesSelect').html("");
            $('#fourthLevelCategoriesSelect').html("");
            $(".chosen-select").chosen();
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

function bringThirdLevelCategoriesSelect()
{
    var secondLevelCategoryId = $('select[name="pathology_category_class_two_id"]').val();

    $.ajax({
        url: "/helpers/pathologicalCategoryClassTwo/getChildCategories/" + secondLevelCategoryId,
        type: 'get',
        success: function(result) {
            $('#thirdLevelCategoriesSelect').html(result);
            $('#fourthLevelCategoriesSelect').html("");
            $(".chosen-select").chosen();
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

function bringFourthLevelCategoriesSelect()
{
    var thirdLevelCategoryId = $('select[name="pathology_category_class_three_id"]').val();

    $.ajax({
        url: "/helpers/pathologicalCategoryClassThree/getChildCategories/" + thirdLevelCategoryId,
        type: 'get',
        success: function(result) {
            $('#fourthLevelCategoriesSelect').html(result);
            $(".chosen-select").chosen();
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

function makeSampleMedicalReport(sampleId)
{
    $.ajax({
        url: "/pathologicalAnatomy/createMedicalReport/" + sampleId,
        type: 'get',
        success: function(result) {

            dialog = bootbox.dialog({
                backdrop  : "static",
                title: '<h3>Informe patológico.</h3>',
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
                            storePathologicalAnatomyMedicalProtocol(sampleId);
                            return false;
                        }
                    }
                }
            }).init( function() {

                $(".chosen-select").chosen({
                    width: "100%",
                    placeholder_text_single: "Seleccione una opción",
                    no_results_text: "Sin resultados."
                });

                editor = textboxio.replace('#editor');

            });
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

function editSampleMedicalReport(sampleId)
{
    $.ajax({
        url: "/pathologicalAnatomy/editMedicalReport/" + sampleId,
        type: 'get',
        success: function(result) {

            dialog = bootbox.dialog({
                backdrop  : "static",
                title: '<h3>Informe patológico.</h3>',
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
                            updatePathologicalAnatomyMedicalProtocol(sampleId);
                            return false;
                        }
                    }
                }
            }).init( function() {

                $(".chosen-select").chosen({
                    width: "100%",
                    placeholder_text_single: "Seleccione una opción",
                    no_results_text: "Sin resultados."
                });

                editor = textboxio.replace('#editor');

            });
        },
        error: function (data) {
            var exeption = data.responseJSON;
            addErrors(exeption.errors, '#results');
        }
    });
}

