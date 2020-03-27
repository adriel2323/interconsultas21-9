<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class ConsultingRoomBiopsies
 * @package App\Models
 * @version April 20, 2018, 9:39 am UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\BiopsiesType biopsiesType
 * @property \App\Models\User user
 * @property \App\Models\O o
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string patient_name
 * @property integer biopsy_type
 * @property integer doctor
 * @property integer os
 * @property string biopsy_number
 * @property date delivery_date
 * @property string autorized_order
 * @property integer patologist
 */
class ConsultingRoomBiopsies extends BaseModel
{
    use Userstamps;
    use SoftDeletes;

    public $table = 'consulting_room_biopsies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'patient_document',
        'patient_name',
        'biopsy_type',
        'doctor',
        'os',
        'delivery_date',
        'autorized_order',
        'patologist'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'patient_document' => 'string',
        'patient_name' => 'string',
        'biopsy_type' => 'integer',
        'doctor' => 'integer',
        'os' => 'integer',
        'delivery_date' => 'date',
        'autorized_order' => 'string',
        'patologist' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'patient_name' => 'required',
        'doctor' => 'required',
        'os' => 'required',
        'delivery_date' => 'required',
        'autorized_order' => 'required',
        'patologist' => 'required',
        'biopsy_type' => 'required'
    ];

    public static $messages = [
        'patient_name.required' => 'El campo "Nombre del Paciente" es obligatorio.',
        'doctor.required' => 'El campo "Médico Actuante" es obligatorio.',
        'os.required' => 'El campo "Obra Social" es obligatorio.',
        'delivery_date.required' => 'El campo "Fecha de Entrega" es obligatorio.',
        'autorized_order.required' => 'El campo "Orden Autorizada" es obligatorio.',
        'patologist.required' => 'El campo "Patólogo" es obligatorio.',
        'biopsy_type.required' => 'El campo "Tipo de Biopsia" es obligatorio.',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function biopsy_type()
    {
        return $this->belongsTo(\App\Models\biopsies_types::class,'biopsy_type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function doctor()
    {
        return $this->belongsTo(\App\Models\Users::class,'doctor');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function os()
    {
        return $this->belongsTo(\App\Models\Os::class,'os');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patologist()
    {
        return $this->belongsTo(\App\Models\Users::class,'patologist');
    }
}
