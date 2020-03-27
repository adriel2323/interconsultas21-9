var eventId;
var table;
$(document).ready(function() {
    table = $('#surgeryEvents').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/surgery/dataTable/' + $('input[name="date"]').val(),
        columnDefs: [
            {
                targets: 0,
                data: 'start_date',
                name: 'start_date',
                title: 'Fecha de cirugía'
            },
            {
                targets: 1,
                data: 'name',
                name: 'name',
                title: 'Nombre del Paciente'
            },
            {
                targets: 2,
                data: 'resource_id',
                name: 'resource_id',
                title: 'Quirófano'
            },
            {
                targets: 3,
                data: 'status_id',
                name: 'status_id',
                title: 'Estado'
            },
            {
                targets: 4,
                data: 'surgery_type_id',
                name: 'surgery_type_id',
                title: 'Tipo de cirugía'
            },
            {
                targets: 5,
                data: 'os',
                name: 'os',
                title: 'Obra Social'
            },
            {
                targets: 6,
                data: 'surgeon',
                name: 'surgeon',
                title: 'Cirujano'
            },
            {
                targets: 7,
                data: 'actions',
                name: 'actions',
                title: 'Acciones'
            }
        ],
        language: {url: '/css/datatables/spanish.json'}
    });

    contextMenuBuilder();

});

function reloadDataTable()
{
    var url = "/surgery/dataTable/" + $('input[name="date"]').val();

    table.ajax.url( url ).load();
}
function contextMenuBuilder()
{

    context.init({preventDoubleContext: false});

    context.attach('.fc-time-grid-event', [
        {header: 'Opciones'},
        {
            text: 'Editar',
            action: function(e) {
                e.preventDefault();

                getEventInfo(eventId);
            }
        },
        {
            text: 'Protocolo Quirúrgico',
            action: function(e) {
                e.preventDefault();

                isSurgicalProtocolCreated(eventId);
            }
        }
    ]);
}