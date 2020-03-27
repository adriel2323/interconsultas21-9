<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Wildside\Userstamps\Userstamps;

/**
 * Class Interconsulting
 * @package App\Models
 * @version July 23, 2018, 1:40 pm -03
 *
 * @property \App\Models\User user
 * @property \App\Models\Service service
 * @property \App\Models\User user
 * @property \App\Models\InterconsultingStatus interconsultingStatus
 * @property \Illuminate\Database\Eloquent\Collection emergencyConsultings
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer requester_id
 * @property integer requested_service_id
 * @property integer requested_doctor_id
 * @property integer status_id
 * @property string observations
 */
class Interconsulting extends BaseModel
{
    use SoftDeletes;
    use Userstamps;
    use Notifiable;

    public $table = 'interconsulting';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'requester_id',
        'requested_service_id',
        'requested_doctor_id',
        'status_id',
        'room_id',
        'observations',
        'patient_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'requester_id' => 'integer',
        'requested_service_id' => 'integer',
        'requested_doctor_id' => 'integer',
        'status_id' => 'integer',
        'room_id' => 'integer',
        'observations' => 'string',
        'patient_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'observations' => 'required',
        'patient_name' => 'required',
        'requested_doctor_id' => 'required',
        'requested_service_id' => 'required',

    ];

    public static $messages = [
        'observation.required' => 'El campo "Observacion" es obligatorio',
        'patient_name.required' => 'El campo "Nombre del paciente" es obligatorio',
        'requested_doctor_id.required' => 'Debe seleccionar el médico solicitado.',
        'requested_service_id.required' => 'Debe seleccionar el servicio solicitado.'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function requester()
    {
        return $this->belongsTo(\App\Models\Users::class,'requester_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class,'requested_service_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function requested()
    {
        return $this->belongsTo(\App\Models\Doctor::class,'requested_doctor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function status()
    {
        return $this->belongsTo(\App\Models\InterconsultingStatuses::class,'status_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function room()
    {
        return $this->belongsTo(\App\Models\Rooms::class,'room_id');
    }
}
