<?php

namespace App\Repositories;

use App\Models\Os;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OsRepository
 * @package App\Repositories
 * @version April 20, 2018, 8:09 am UTC
 *
 * @method Os findWithoutFail($id, $columns = ['*'])
 * @method Os find($id, $columns = ['*'])
 * @method Os first($columns = ['*'])
*/
class OsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Os::class;
    }
}
