<?php

namespace App\Repositories;

use App\Models\Accounting\AccountingCheck;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AccountingCheckRepository
 * @package App\Repositories
 * @version March 21, 2019, 1:53 pm -03
 *
 * @method AccountingCheck findWithoutFail($id, $columns = ['*'])
 * @method AccountingCheck find($id, $columns = ['*'])
 * @method AccountingCheck first($columns = ['*'])
*/
class AccountingCheckRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return AccountingCheck::class;
    }
}
