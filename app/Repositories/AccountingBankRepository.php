<?php

namespace App\Repositories;

use App\Models\Accounting\AccountingBank;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AccountingBankRepository
 * @package App\Repositories
 * @version March 20, 2019, 12:04 pm -03
 *
 * @method AccountingBank findWithoutFail($id, $columns = ['*'])
 * @method AccountingBank find($id, $columns = ['*'])
 * @method AccountingBank first($columns = ['*'])
*/
class AccountingBankRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'account_number',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AccountingBank::class;
    }
}
