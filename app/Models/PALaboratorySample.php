<?php

namespace App\Models;

use App\Models\GesInMed\ImagesDates;
use App\Models\GesInMed\Patients;
use App\Models\Institutions\Institution;
use App\Models\Nomenclator\NomenclatorPractice;
use App\Models\pathologicalAnatomy\PathologicalAnatomyMedicalReport;
use App\Models\Surgery\SurgeryEvent;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class PALaboratorySample
 * @package App\Models
 * @version June 12, 2019, 12:15 pm -03
 *
 * @property \App\Models\Department department
 * @property \Illuminate\Database\Eloquent\Collection instrumentistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection nursesSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rxSpecialistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property string code
 * @property integer patient_id
 * @property integer department_id
 * @property integer cdi_date_id
 * @property integer surgery_event_id
 * @property string|\Carbon\Carbon received_at
 * @property integer created_by
 * @property integer updated_by
 * @property integer deleted_by
 */
class PALaboratorySample extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'pathological_anatomy_laboratory_samples';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'patient_id',
        'department_id',
        'cdi_date_id',
        'surgery_event_id',
        'received_at',
        'created_by',
        'updated_by',
        'deleted_by',
        'pathological_category_level_one_id',
        'pathological_category_level_two_id',
        'pathological_category_level_three_id',
        'pathological_category_level_four_id',
        'institution_id',
        'biopsy_type_id',
        'doctor_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'string',
        'patient_id' => 'integer',
        'department_id' => 'integer',
        'cdi_date_id' => 'integer',
        'surgery_event_id' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer',
        'pathological_category_level_one_id' => 'integer',
        'pathological_category_level_two_id' => 'integer',
        'pathological_category_level_three_id' => 'integer',
        'pathological_category_level_four_id' => 'integer',
        'institution_id' => 'integer',
        'biopsy_type_id' => 'integer',
        'doctor_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cdiDateId' => 'required|exists:Hospital.IMG_TURNO,IMG_TURNO_ID',
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'cdiDateId.required' => 'Debe envíar el ID del turno.',
        'cdiDateId.exists' => 'El ID de turno envíado no existe en la base de datos.'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(\App\Models\Department::class);
    }

    public function patient()
    {
        return $this->belongsTo(Patients::class, 'patient_id', 'cuil');
    }

    public function cdiDate()
    {
        return $this->belongsTo(ImagesDates::class, 'cdi_date_id', 'IMG_TURNO_ID');
    }

    public function surgeryEvent()
    {
        return $this->belongsTo(SurgeryEvent::class);
    }

    public function medicalReport()
    {
        return $this->hasOne(PathologicalAnatomyMedicalReport::class, 'pathological_anatomy_laboratory_sample_id');
    }

    public function storeMedicalReport($medicalReport)
    {
        return PathologicalAnatomyMedicalReport::create([
            'pathological_anatomy_laboratory_sample_id' => $this->id,
            'medical_report' => $medicalReport
        ]);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class, 'institution_id');
    }

    public function billingCodes()
    {
        return $this->belongsToMany(NomenclatorPractice::class,'pathological_anatomy_samples_billing_codes','pa_sample_id','nomenclator_practice_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
}
