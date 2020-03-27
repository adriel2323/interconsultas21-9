<?php

namespace App\Models\Accounting;

use App\Models\BaseModel;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class AccountingBank
 * @package App\Models
 * @version March 20, 2019, 12:04 pm -03
 *
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection instrumentistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection nursesSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rxSpecialistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property string name
 * @property string account_number
 * @property integer created_by
 * @property integer updated_by
 * @property integer deleted_by
 */
class AccountingBank extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'accounting_banks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'account_number',
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
        'account_number' => 'string',
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
        
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        
    ];
}
