var patientsTable = null;

function patientList()
{
    patientTableInit();

}

function searchPatient()
{
    var patient_document = $('input[name="patient_document"]').val();
    if(patient_document.length < 1) {
        patientDocumentRequired();
    } else {

        if(null === patientsTable) {
            patientsTable = $('#patientsTable').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: '/datatables/patientList/' + patient_document,
                columnDefs: [
                    {
                        targets: 0,
                        data: 'documento',
                        name: 'documento',
                        title: 'DNI',
                    },
                    {
                        targets: 1,
                        data: 'apellido',
                        name: 'apellido',
                        title: 'Nombre y Apellido',
                    },
                    {
                        targets: 2,
                        data: 'CodOS',
                        name: 'CodOS',
                        title: 'Obra Social'
                    },
                ],
                language: {url: '/css/datatables/spanish.json'}
            });
        } else {

            var url = '/datatables/patientList/' + $('input[name="patient_document"]').val();

            patientsTable.ajax.url( url ).load();
        }
    }


}

function checkRequiredFields()
{

    if( patientsTable === null ) {
        selectedPatientError();
    } else {

        if(( ! patientsTable.rows() )) {

            selectedPatientError();

        } else {
            storeSample();
        }

    }

}

function storeSample()
{
    var patient = patientsTable.rows().data();
    patient = patient[0];
    var institution_id = $('select[name="institution_id"]').val();
    var department_id = $('select[name="department_id"]').val();
    var biopsy_type_id = $('select[name="biopsy_type_id"]').val();
    var doctor_id = $('select[name="doctor_id"]').val();
    var token = $('input[name="_token"]').val();

    var data = {
        patient_id: patient.cuil,
        institution_id: institution_id,
        department_id: department_id,
        biopsy_type_id: biopsy_type_id,
        _token: token
    };

    $.ajax({
        url: '/pathologicalAnatomy/create',
        type: "POST",
        data: data,
        success: function(result) {
            window.open(result, '_blank');
            location.href = '/pathologicalAnatomy/create';
        },
        error: function(data) {
            var exception = data.responseJSON;
            addErrors(exception.errors);
        }

    });
}

function selectedPatientError()
{
    bootbox.alert({
        message: "Tiene que seleccionar un paciente.",
        className: "modal30"
    });
}

function patientDocumentRequired()
{
    bootbox.alert("Tiene que introducir un DNI.");
}