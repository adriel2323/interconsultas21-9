<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class InternshipBiopsies
 * @package App\Models
 * @version April 20, 2018, 8:22 am UTC
 *
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \App\Models\O o
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string patient_name
 * @property integer doctor
 * @property integer os
 * @property string biopsy_number
 * @property date delivery_date
 * @property string autorized_order
 * @property integer patologist
 */
class InternshipBiopsies extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'internship_biopsies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'patient_document',
        'patient_name',
        'biopsy_type_id',
        'doctor_id',
        'os_id',
        'delivery_date',
        'autorized_order',
        'patologist_id'
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
        'biopsy_type_id' => 'integer',
        'doctor_id' => 'integer',
        'os_id' => 'integer',
        'delivery_date' => 'date',
        'autorized_order' => 'string',
        'patologist_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'patient_name' => 'required',
        'doctor_id' => 'required',
        'os_id' => 'required',
        'delivery_date' => 'required',
        'autorized_order' => 'required',
        'patologist_id' => 'required',
        'biopsy_type_id' => 'required'
    ];

    public static $messages = [
        'patient_name.required' => 'El campo "Nombre del Paciente" es obligatorio.',
        'doctor_id.required' => 'El campo "Médico Actuante" es obligatorio.',
        'os_id.required' => 'El campo "Obra Social" es obligatorio.',
        'delivery_date.required' => 'El campo "Fecha de Entrega" es obligatorio.',
        'autorized_order.required' => 'El campo "Orden Autorizada" es obligatorio.',
        'patologist_id.required' => 'El campo "Patólogo" es obligatorio.',
        'biopsy_type_id.required' => 'El campo "Tipo de Biopsia" es obligatorio.',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function biopsy_type()
    {
        return $this->belongsTo(\App\Models\biopsies_types::class,'biopsy_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function patologist()
    {
        return $this->belongsTo(\App\Models\Users::class,'patologist_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function os()
    {
        return $this->belongsTo(\App\Models\Os::class,'os_id');
    }
}
