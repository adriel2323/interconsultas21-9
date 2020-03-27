var dataTable = null;

$(document).ready(function() {

    dataTable =  $('#informedPathologicalAnatomySamplesTable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: '/pathologicalAnatomy/informedSamplesTable',
        columnDefs: [
            {
                targets: 0,
                data: 'created_at',
                name: 'created_at'
            },
            {
                targets: 1,
                data: 'patient_name',
                name: 'patient_name'
            },
            {
                targets: 2,
                data: 'validated_at',
                name: 'validated_at',
                searchable: false
            },
            {
                targets: 3,
                data: 'validated_by',
                name: 'validated_by',
                searchable: false
            },
            {
                targets: 4,
                data: 'download',
                name: 'download',
                searchable: false
            },
        ],
        language: {url: '/assets/css/datatables/spanish.json'}
    });

});
