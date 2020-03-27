<?php

namespace App\Repositories\Accounting;

use App\Models\Accounting\Receipts;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReceiptsRepository
 * @package App\Repositories\Accounting
 * @version September 30, 2018, 5:02 pm -03
 *
 * @method Receipts findWithoutFail($id, $columns = ['*'])
 * @method Receipts find($id, $columns = ['*'])
 * @method Receipts first($columns = ['*'])
*/
class ReceiptsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'number',
        'amount',
        'company',
        'comments'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Receipts::class;
    }
}
