<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$proxy_url    = getenv('PROXY_URL');

$proxy_schema = getenv('PROXY_SCHEMA');

if(!empty($proxy_url)) {

    URL::forceRootUrl($proxy_url);

}

if(!empty($proxy_schema)) {
    URL::forceSchema($proxy_schema);
}

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@index');

    Route::resource('users', 'UsersController');

    //Perfiles
    Route::resource('profiles', 'ProfileController');
    Route::get('/profiles/setPermissions/{id}','ProfileController@setPermissions');
    Route::post('/profiles/setPermissions','ProfileController@postSetPermissions');
    //

    //Servicios
    Route::resource('services', 'ServiceController');
    Route::get('/services/getDoctors/{serviceId}','ServiceController@getDoctors');
    //

    //Obras Sociales
    Route::resource('os', 'OsController');
    //

    //Tipos de Biopsias
    Route::resource('biopsiesTypes', 'biopsies_typesController');
    //

    //Biopsias de Internados
    Route::resource('internshipBiopsies', 'InternshipBiopsiesController');
    //

    //Biopsias de consultorios
    Route::resource('consultingRoomBiopsies', 'ConsultingRoomBiopsiesController');
    //

    //Consultas de Guardia
    Route::resource('emergencyConsultings', 'EmergencyConsultingsController');
    //

    //Tipos de estudios (No utilizado por el momento)
    Route::resource('studiesTypes', 'StudiesTypesController');
    //

    //Interconsultas
    Route::resource('interconsultings', 'InterconsultingController');
    Route::get('/interconsulting/pending/', 'InterconsultingController@pendings');
    Route::get('/interconsulting/pending/{doctor_id}', 'InterconsultingController@pendingsQuery');
    Route::get('/interconsulting/changeStatus/{InterconsultingID}/{statusID}', 'InterconsultingController@setStatus');
    //

    //Especialistas
    Route::resource('doctors', 'DoctorController');
    //

    /*
     * Reportes
     */
    Route::get('/reports','ReportsController@Index');
    Route::get('/reports/InternshipBiopsies/{documentType}/{from}/{to}','ReportsController@InternshipBiopsies');
    Route::get('/reports/SurgeryEventsWithXRay/{documentType}','ReportsController@SurgeryEventsWithXRay');
    Route::get('/reports/SurgeryEventsWithXRayBetweenDates/{documentType}/{from}/{to}','ReportsController@SurgeryEventsWithXRayBetweenDates');
    Route::get('/reports/SurgeryEventsBetweenDates/{documentType}/{from}/{to}','ReportsController@SurgeryEventsBetweenDates');
    Route::get('/reports/SurgeryDateEventsBetweenDates/{documentType}/{from}/{to}','ReportsController@SurgeryDateEventsBetweenDates');
    Route::get('/reports/SurgeryEventsByDoctorBetweenDates/{documentType}/{doctor_id}/{from}/{to}','ReportsController@SurgeryEventsByDoctorBetweenDates');
    /*Anatomia Patologica*/
    Route::get('/reports/nonReceivedPathologicalAnatomySamplesBetweenDates/{documentType}/{from}/{to}','ReportsController@nonReceivedPathologicalAnatomySamplesBetweenDates');
    Route::get('/reports/receivedNonReportedPathologicalAnatomySamplesBetweenDates/{documentType}','ReportsController@receivedNonReportedPathologicalAnatomySamplesBetweenDates');
    Route::get('/reports/pathologicalAnatomy/diagnosticCodes','ReportsController@pathologicalAnatomyDiagnosticCodes');

    /**
     * Reports Helpers
     */
    Route::get('/helpers/BetweenDates','HelpersController@betweenDates');
    Route::get('/helpers/SurgeryEvents/byDoctorBetweenDates','HelpersController@SurgeryEventsByDoctorBetweenDates');


    //

    /*
     * Surgery Agenda
     */
    Route::get('/surgery', 'SurgeryController@index');
    Route::post('/surgery/dragEvent', 'SurgeryController@dragEvent');
    Route::get('/surgery/create/{date?}/{resourceId?}', 'SurgeryController@create');
    Route::post('/surgery/store', 'SurgeryController@store');
    Route::post('/surgery/update', 'SurgeryController@update');
    Route::get('/surgery/getEventInfo/{id}', 'SurgeryController@getEventInfo');
    Route::post('/surgery/changeEventStatus', 'SurgeryController@changeEventStatus');
    Route::post('/surgery/destroy', 'SurgeryController@destroy');
    Route::post('/surgery/updateComments', 'SurgeryController@updateComments');
    Route::get('/surgery/dataTable/{date}', 'SurgeryController@dataTable')->name('surgeryDataTable');
    Route::get('/surgery/list', 'SurgeryController@list');
    Route::post('/surgery/updateEventData/{surgeryEventId}', 'SurgeryController@updateEventData');
    Route::post('/surgery/updatePatientData/{surgeryEventId}', 'SurgeryController@updatePatientData');
    Route::post('/surgery/updateSurgeryData/{surgeryEventId}', 'SurgeryController@updateSurgeryData');
    Route::get('/surgery/createSurgicalProtocol/{surgeryEventId}', 'SurgeryController@createSurgicalProtocol');
    Route::post('/surgery/storeSurgicalProtocol/{surgeryEventId}', 'SurgeryController@storeSurgicalProtocol');
    Route::get('/surgery/surgicalProtocol/print/{surgicalProtocolId}', 'SurgeryController@printSurgicalProtocol');
    Route::get('/surgery/surgicalProtocol/printBySurgeryEventId/{surgeryEventId}', 'SurgeryController@printSurgicalProtocolBySurgeryEventId');
    Route::get('/surgery/SurgicalProtocol/exists/{surgeryEventId}', 'SurgeryController@existsSurgicalProtocol');
    Route::get('/surgery/SurgicalProtocol/isEditable/{surgeryEventId}', 'SurgeryController@isSurgicalProtocolEditable');
    Route::get('/surgery/SurgicalProtocol/editableSurgicalProtocolModal/{surgeryEventId}', 'SurgeryController@surgicalProtocolIsEditableModal');
    Route::get('/surgery/SurgicalProtocol/editSurgicalProtocolModal/{surgeryEventId}', 'SurgeryController@editSurgicalProtocol');
    Route::post('/surgery/updateSurgicalProtocol/{surgeryEventId}', 'SurgeryController@updateSurgicalProtocol');


    /*Tipos de Cirugía*/
    Route::get('surgeryTypes', ['as'=> 'surgeryTypes.index', 'uses' => 'Surgerytypes\SurgeryTypeController@index']);
    Route::post('surgeryTypes', ['as'=> 'surgeryTypes.store', 'uses' => 'Surgerytypes\SurgeryTypeController@store']);
    Route::get('surgeryTypes/create', ['as'=> 'surgeryTypes.create', 'uses' => 'Surgerytypes\SurgeryTypeController@create']);
    Route::put('surgeryTypes/{surgeryTypes}', ['as'=> 'surgeryTypes.update', 'uses' => 'Surgerytypes\SurgeryTypeController@update']);
    Route::patch('surgeryTypes/{surgeryTypes}', ['as'=> 'surgeryTypes.update', 'uses' => 'Surgerytypes\SurgeryTypeController@update']);
    Route::delete('surgeryTypes/{surgeryTypes}', ['as'=> 'surgeryTypes.destroy', 'uses' => 'Surgerytypes\SurgeryTypeController@destroy']);
    Route::get('surgeryTypes/{surgeryTypes}', ['as'=> 'surgeryTypes.show', 'uses' => 'Surgerytypes\SurgeryTypeController@show']);
    Route::get('surgeryTypes/{surgeryTypes}/edit', ['as'=> 'surgeryTypes.edit', 'uses' => 'Surgerytypes\SurgeryTypeController@edit']);
    //

    /*Recibos de contaduría*/
    Route::get('accounting/receipts', ['as'=> 'accounting.receipts.index', 'uses' => 'Accounting\ReceiptsController@index']);
    Route::post('accounting/receipts', ['as'=> 'accounting.receipts.store', 'uses' => 'Accounting\ReceiptsController@store']);
    Route::get('accounting/receipts/create', ['as'=> 'accounting.receipts.create', 'uses' => 'Accounting\ReceiptsController@create']);
    Route::put('accounting/receipts/{receipts}', ['as'=> 'accounting.receipts.update', 'uses' => 'Accounting\ReceiptsController@update']);
    Route::patch('accounting/receipts/{receipts}', ['as'=> 'accounting.receipts.update', 'uses' => 'Accounting\ReceiptsController@update']);
    Route::delete('accounting/receipts/{receipts}', ['as'=> 'accounting.receipts.destroy', 'uses' => 'Accounting\ReceiptsController@destroy']);
    Route::get('accounting/receipts/{receipts}', ['as'=> 'accounting.receipts.show', 'uses' => 'Accounting\ReceiptsController@show']);
    Route::get('accounting/receipts/{receipts}/edit', ['as'=> 'accounting.receipts.edit', 'uses' => 'Accounting\ReceiptsController@edit']);
    //

    //Compañías de ART
    Route::resource('insuranceCompanies', 'insuranceCompaniesController');

    //Ortopedias
    Route::resource('orthopedics', 'OrthopedicsController');

    Route::resource('webNews', 'WebNewsController');

    Route::get('/ExtraHourRequest', 'employeesModule\ExtraHoursController@create');
    Route::post('/ExtraHourRequest', 'employeesModule\ExtraHoursController@storeRequest');

    //Módulo de contaduría - Bancos
    Route::resource('accountingBanks', 'Accounting\AccountingBankController');

    //Modulo de contaduría - Proveedores
    Route::resource('accountingVendors', 'Accounting\AccountingVendorController');

    //Modulo de contaduría - Fábrica de cheques
    Route::resource('accountingChecks', 'Accounting\AccountingCheckController');
    Route::get('/helpers/accountingChecks/getVendorPayName/{vendorId}', 'Accounting\AccountingCheckController@getVendorPayName');
    Route::get('/helpers/accountingChecks/getLastCheckNumber/{bankAccountId}', 'Accounting\AccountingCheckController@getLastCheckNumber');
    Route::get('/helpers/accountingChecks/printingRanges', 'Accounting\AccountingCheckController@showPrintingRangesModal');
    Route::get('/accounting/checkPrintingConfirmation/{bankAccountId}/{fromCheckNumber}/{toCheckNumber}', 'Accounting\AccountingCheckController@checkPrintingConfirmation');
    Route::get('/accounting/printChecks/{bankAccountId}/{fromCheckNumber}/{toCheckNumber}', 'Accounting\AccountingCheckController@printChecks');

    //Módulo de Anatomía Patológica
    Route::get('/pathologicalAnatomy', 'pathologicalAnatomy\pathologicalAnatomyController@index');
    Route::get('/pathologicalAnatomy/pathologicalAnatomySamplesDatatable', 'pathologicalAnatomy\pathologicalAnatomyController@dataTable');
    Route::get('/pathologicalAnatomy/setCategoriesModal/{sampleId}', 'pathologicalAnatomy\pathologicalAnatomyController@setCategoriesModal');
    Route::post('/pathologicalAnatomy/setCategories/{sampleId}', 'pathologicalAnatomy\pathologicalAnatomyController@setCategories');
    Route::get('/pathologicalAnatomy/createMedicalReport/{sampleId}', 'pathologicalAnatomy\pathologicalAnatomyController@createMedicalReport');
    Route::get('/pathologicalAnatomy/editMedicalReport/{sampleId}', 'pathologicalAnatomy\pathologicalAnatomyController@editMedicalReport');
    Route::post('/pathologicalAnatomy/updateMedicalReport/{sampleId}', 'pathologicalAnatomy\pathologicalAnatomyController@updateMedicalReport');
    Route::get('/pathologicalAnatomy/getMedicalReportTitle/{titleId}', 'pathologicalAnatomy\pathologicalAnatomyController@getMedicalReportTitle');
    Route::get('/pathologicalAnatomy/getMedicalReportTemplates/{CategoryId}', 'pathologicalAnatomy\pathologicalAnatomyController@getMedicalReportTemplates');
    Route::get('/pathologicalAnatomy/getMedicalReportTemplate/{CategoryId}', 'pathologicalAnatomy\pathologicalAnatomyController@getMedicalReportTemplate');
    Route::post('/pathologicalAnatomy/storeMedicalReport/{PALaboratoryId}', 'pathologicalAnatomy\pathologicalAnatomyController@storeMedicalReport');
    Route::get('/pathologicalAnatomy/printMedicalReport/{PALaboratoryId}', 'pathologicalAnatomy\pathologicalAnatomyController@printMedicalReport');
    Route::get('/pathologicalAnatomy/receiveSamples', 'pathologicalAnatomy\pathologicalAnatomyController@receiveSamples');
    Route::post('/pathologicalAnatomy/receiveSamples', 'pathologicalAnatomy\pathologicalAnatomyController@receiveSample');
    Route::post('/pathologicalAnatomy/{sampleId}/validateMedicalReport', 'pathologicalAnatomy\pathologicalAnatomyController@validateMedicalReport');
    Route::post('/pathologicalAnatomy/{sampleId}/unValidateMedicalReport', 'pathologicalAnatomy\pathologicalAnatomyController@unValidateMedicalReport');
    Route::delete('pathologicalAnatomy/{sampleId}/delete', 'pathologicalAnatomy\pathologicalAnatomyController@destroy')->name('PASample.destroy');

    Route::get('/pathologicalAnatomy/create', 'pathologicalAnatomy\pathologicalAnatomyController@create');
    Route::post('/pathologicalAnatomy/create', 'pathologicalAnatomy\pathologicalAnatomyController@store')->name('pathologicalAnatomy.store');
    Route::get('/pathologicalAnatomy/setBillingCodes/{sampleId}', 'pathologicalAnatomy\pathologicalAnatomyController@setBillingCodes');
    Route::get('/pathologicalAnatomy/informedSamplesTable', 'pathologicalAnatomy\pathologicalAnatomyController@informedAPSamplesTable');
    Route::get('/pathologicalAnatomy/informedSamples', 'pathologicalAnatomy\pathologicalAnatomyController@informedAPSamples');

    /*Categorias de Anatomías patológicas*/
    Route::resource('pathologicalCategoryClassOne', 'pathologicalAnatomy\PathologicalCategoryClassOneController');
    Route::resource('pathologicalCategoryClassTwo', 'pathologicalAnatomy\PathologicalCategoryClassTwoController');
    Route::resource('pathologicalCategoryClassThree', 'pathologicalAnatomy\PathologicalCategoryClassThreeController');
    Route::resource('pathologicalCategoryClassFour', 'pathologicalAnatomy\PathologicalCategoryClassFourController');

    Route::resource('departments', 'DepartmentController');

    /*Helpers*/
    Route::get('helpers/pathologicalCategoryClassOne/getChildCategories/{categoryId}', 'pathologicalAnatomy\PathologicalCategoryClassOneController@getChildCategories');
    Route::get('helpers/pathologicalCategoryClassTwo/getChildCategories/{categoryId}', 'pathologicalAnatomy\PathologicalCategoryClassTwoController@getChildCategories');
    Route::get('helpers/pathologicalCategoryClassThree/getChildCategories/{categoryId}', 'pathologicalAnatomy\PathologicalCategoryClassThreeController@getChildCategories');

    /*Títulos de anatomías patológicas*/
    Route::resource('paTemplatesTitles', 'pathologicalAnatomy\PathologicalAnatomyTemplatesTitlesController');

    /*Plantillas de informes de anatomia patológica*/
    Route::resource('pathologicalAnatomyTemplates', 'pathologicalAnatomy\PathologicalAnatomyTemplateController');
    Route::get('/pathologicalAnatomy/PapanicolaouDialogTemplate', 'pathologicalAnatomy\PathologicalAnatomyTemplateController@papanicolaouDialogTemplate');
    Route::get('/pathologicalAnatomy/getPapanicolaouTemplateDescription/{templateId}', 'pathologicalAnatomy\PathologicalAnatomyTemplateController@getPapanicolaouTemplateDescription');

    /*Instituciones*/
    Route::resource('institutions', 'Institutions\InstitutionsController');
    Route::get('/datatables/institutions', 'Institutions\InstitutionsController@dataTable');

    /**
     * GESINMED
     */
    Route::get('/datatables/patientList/{document}', 'GesInMed\PatientsController@dataTable');
    Route::get('/gesinmed/patientList/index', 'GesInMed\PatientsController@index');

});

    /*=================Rutas publicas=================*/
    Route::get('InterconsultingsFullScreen','InterconsultingController@fullScreen');
    Route::get('Interconsultings/notifications/setViewedStatus/{id}','InterconsultingController@setViewedStatus');
    Route::get('/phpinfo','AppBaseController@phpinfo');

    /*==================KAIROS=====================*/
    Route::get('/kairos', 'KairosController@index');
    Route::post('/kairos/search', 'KairosController@search');
    Route::get('/pathologicalAnatomy/printSticker/{code}', 'pathologicalAnatomy\pathologicalAnatomyController@printSticker');





















