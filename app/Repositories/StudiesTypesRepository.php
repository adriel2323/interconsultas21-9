<?php

namespace App\Repositories;

use App\Models\StudiesTypes;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StudiesTypesRepository
 * @package App\Repositories
 * @version May 15, 2018, 5:55 pm -03
 *
 * @method StudiesTypes findWithoutFail($id, $columns = ['*'])
 * @method StudiesTypes find($id, $columns = ['*'])
 * @method StudiesTypes first($columns = ['*'])
*/
class StudiesTypesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StudiesTypes::class;
    }
}
