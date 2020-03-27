var ckEditor;
$(document).ready(function() {
    $(".chosen-select").chosen({
        o_results_text: "No se han encontrado resultados",
        placeholder_text_single: "Seleccione una opción",
        placeholder_text_multiple: "Seleccione las opciones"
    });

    $('ul').tree();

});

function confirmDelete(id)
{
   bootbox.confirm({
      message: "¿Está seguro de eliminar el registro?",
      class: "bounceIn",
      buttons: {
          confirm: {
              label: 'Si',
              className: 'btn-danger'
          },
          cancel: {
              label: 'No',
              className: 'btn-success'
          }
      },
      callback: function (result) {
          if(result) {
              $("#"+id).submit();
          } else {
              bootbox.hideAll();
          }
      }
   });
}

function getDoctors(serviceId)
{
    console.log(serviceId);
    $.ajax({
        url: "/services/getDoctors/" + serviceId,
        type: 'get',
        success: function(result) {
            $('#doctors').html(result);
            $(".chosen-select").chosen();

        }
    });

}

function toastrResponseError(errorCode, data)
{
    switch(errorCode) {
        case 500:
            toastr.error("Ha ocurrido un error en el servidor. Por favor contáctese con la oficina de sistemas.");
            break;
        case 404:
            toastr.error("No se ha encontrado la ruta hacia el servidor. Por favor contáctese con la oficina de sistemas.");
            break;
        case 403:
            toastr.error("Usted no tiene permisos para realizar la acción solicitada.");
            break;
        case 422:
            addErrors(data.errors);
            break;
    }
}

