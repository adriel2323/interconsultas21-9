<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class insuranceCompanies
 * @package App\Models
 * @version February 1, 2019, 9:00 am -03
 *
 * @property \Illuminate\Database\Eloquent\Collection doctors
 * @property \Illuminate\Database\Eloquent\Collection instrumentistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection nursesSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rxSpecialistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEvents
 * @property string name
 * @property string address
 * @property string phone
 */
class insuranceCompanies extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'insurance_companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'address',
        'phone'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'address' => 'string',
        'phone' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'name.required' => 'El campo "NOMBRE" es obligatorio.'
    ];

    
}
