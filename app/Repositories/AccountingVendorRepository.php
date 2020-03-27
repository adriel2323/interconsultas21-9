<?php

namespace App\Repositories;

use App\Models\Accounting\AccountingVendor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AccountingVendorRepository
 * @package App\Repositories
 * @version March 20, 2019, 1:37 pm -03
 *
 * @method AccountingVendor findWithoutFail($id, $columns = ['*'])
 * @method AccountingVendor find($id, $columns = ['*'])
 * @method AccountingVendor first($columns = ['*'])
*/
class AccountingVendorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fantasy_name',
        'pay_name',
        'cuit',
        'address',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AccountingVendor::class;
    }
}
