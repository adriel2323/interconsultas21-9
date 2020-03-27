var table;

$(document).ready(function(){
    table = $('#institutionsTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/datatables/institutions',
        columnDefs: [
            {
                targets: 0,
                data: 'name',
                name: 'name',
                title: 'Nombre',
            },
            {
                targets: 1,
                data: 'actions',
                name: 'actions',
                title: 'Acciones',
                searchable: false
            }
        ],
        language: {url: '/css/datatables/spanish.json'}
    });
});