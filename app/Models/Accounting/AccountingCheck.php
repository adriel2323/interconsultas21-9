<?php

namespace App\Models\Accounting;

use App\Models\BaseModel;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;
use Jenssegers\Date\Date;

/**
 * Class AccountingCheck
 * @package App\Models
 * @version March 21, 2019, 1:53 pm -03
 *
 * @property \App\Models\AccountingBank accountingBank
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \App\Models\User user
 * @property \App\Models\AccountingVendor accountingVendor
 * @property \Illuminate\Database\Eloquent\Collection instrumentistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection nursesSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rxSpecialistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property integer check_number
 * @property integer accounting_vendor_id
 * @property integer accounting_bank_account
 * @property string|\Carbon\Carbon emission_date
 * @property string|\Carbon\Carbon expiration_date
 * @property string pay_name
 * @property float amount
 * @property integer created_by
 * @property integer updated_by
 * @property integer deleted_by
 */
class AccountingCheck extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'accounting_checks';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'check_number',
        'accounting_vendor_id',
        'accounting_bank_account',
        'emission_date',
        'expiration_date',
        'pay_name',
        'amount',
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
        'check_number' => 'integer',
        'accounting_vendor_id' => 'integer',
        'accounting_bank_account' => 'integer',
        'amount' => 'float',
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
        'check_number' => 'required',
        'accounting_vendor_id' => 'required',
        'accounting_bank_account' => 'required',
        'pay_name' => 'required',
        'amount' => 'numeric|min:0',
        'emission_date' => 'required',
        'expiration_date' => 'required'
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'check_number.required' => 'Debe ingresar el número de cheque.',
        'accounting_vendor_id.required' => 'Debe seleccionar el proveedor.',
        'accounting_bank_account.required' => 'Debe seleccionar la cuenta bancaria.',
        'pay_name.required' => 'Debe ingresar el nombre que aparecerá en el cheque.',
        'amount.numeric' => 'Debe ingresar el monto del cheque.',
        'amount.min' => 'El monto del cheque debe ser mayor a :min.',
        'emission_date.required' => 'Debe ingresar la fecha de emisión.',
        'expiration_date.required' => 'Debe ingresar la fecha de expiración.'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bankAccount()
    {
        return $this->belongsTo(AccountingBank::class, 'accounting_bank_account');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function vendor()
    {
        return $this->belongsTo(AccountingVendor::class, 'accounting_vendor_id');
    }

    public function getMonth($emission_date)
    {
        return new Date($emission_date);
    }
}
