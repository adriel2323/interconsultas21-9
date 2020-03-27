<?php

namespace App\Models\employeesModule;

use Eloquent as Model;

/**
 * Class ExtraHoursReason
 * @package App\Models\Employeesmodule
 * @version February 21, 2019, 10:57 am -03
 *
 * @property \App\Models\Employeesmodule\User user
 * @property \App\Models\Employeesmodule\User user
 * @property \App\Models\Employeesmodule\User user
 * @property \Illuminate\Database\Eloquent\Collection ExtraHoursRequest
 * @property \Illuminate\Database\Eloquent\Collection news
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property integer created_by
 * @property integer updated_by
 * @property integer deleted_by
 */
class ExtraHoursReason extends Model
{
    protected $connection = 'personal';

    public $table = 'extra_hours_reasons';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:extra_hours_reasons,name'
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'name.required' => 'Debe ingresar un NOMBRE para el motivo.',
        'name.unique' => 'El motivo ingresado ya existe en la base de datos.'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function extraHoursRequests()
    {
        return $this->hasMany(\App\Models\Employeesmodule\ExtraHoursRequest::class);
    }
}
