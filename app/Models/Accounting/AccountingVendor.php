<?php

namespace App\Models\Accounting;

use App\Models\BaseModel;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class AccountingVendor
 * @package App\Models
 * @version March 20, 2019, 1:37 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection AccountingCheck
 * @property \Illuminate\Database\Eloquent\Collection instrumentistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection nursesSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rxSpecialistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property string fantasy_name
 * @property string pay_name
 * @property string cuit
 * @property string address
 * @property integer created_by
 * @property integer updated_by
 * @property integer deleted_by
 */
class AccountingVendor extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'accounting_vendors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'fantasy_name',
        'pay_name',
        'cuit',
        'address',
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
        'fantasy_name' => 'string',
        'pay_name' => 'string',
        'cuit' => 'string',
        'address' => 'string',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function accountingChecks()
    {
        return $this->hasMany(\App\Models\AccountingCheck::class);
    }
}
