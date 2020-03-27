<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class EmergencyConsultings
 * @package App\Models
 * @version May 12, 2018, 12:15 am UTC
 *
 * @property \App\Models\O o
 * @property \App\Models\O o
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer os
 * @property integer doctor
 * @property string dni
 * @property string name
 */
class EmergencyConsultings extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'emergency_consultings';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'os',
        'doctor',
        'dni',
        'name',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'os' => 'integer',
        'doctor' => 'integer',
        'dni' => 'string',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'os' => 'required|exists:os,id',
        'doctor' => 'required|exists:users,id',
        'dni' => 'numeric',
        'name' => 'required'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $messages = [
        'os.required' => 'Debe seleccionar la obra social.',
        'os.exists' => 'La obra social seleccionada no es válida',
        'doctor.required' => 'Debe seleccionar el médico que atenderá al paciente.',
        'doctor.exists' => 'El médico seleccionado no es válido.',
        'dni.numeric' => 'El DNI ingresado no es válido',
        'name.required' => 'Debe ingresar el nombre del paciente.'
    ];

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
}
