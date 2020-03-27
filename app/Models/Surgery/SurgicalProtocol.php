<?php

namespace App\Models\Surgery;

use App\Models\BaseModel;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class SurgicalProtocol extends BaseModel
{
    use Userstamps;
    use SoftDeletes;

    public $table = 'surgical_protocol';

    public $fillable = [
        'surgery_event_id',
        'perfusion_doctor_id',
        'service_id',
        'pre_operatory_diagnostic',
        'surgical_procedure',
        'surgery_schema_description',
        'start_date',
        'end_date'
    ];

    public $casts = [
        'surgery_event_id' => 'integer',
        'perfusion_doctor_id' => 'integer',
        'service_id' => 'integer',
        'pre_operatory_diagnostic' => 'string',
        'surgical_procedure' => 'string',
        'surgery_schema_description' => 'string'
    ];

    public static $rules = [
        'service_id' => 'required',
        'pre_operatory_diagnostic' => 'required',
        'surgical_procedure' => 'required',
        'surgery_schema_description' => 'required',
        'start_date' => 'required',
        'end_date' => 'required'
    ];

    public static $messages = [
        'service_id.required' => 'Debe seleccionar el servicio.',
        'pre_operatory_diagnostic.required' => 'Debe ingresar el diagnóstico pre-operatorio',
        'surgical_procedure.required' => 'Debe ingresar el procedimiento quirúrgico',
        'surgery_schema_description.required' => 'Debe ingresar la descripción y esquema operatorio',
        'start_date.required' => 'Debe ingresar la fecha y hora de inicio de la cirugía.',
        'end_date.required' => 'Debe ingresar la fecha y hora de finalización de la cirugía.'
    ];

    public function surgeryEvent()
    {
        return $this->belongsTo(SurgeryEvent::class, 'surgery_event_id');
    }

    public function perfusionDoctor()
    {
        return $this->belongsTo(Doctor::class, 'perfusion_doctor_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
