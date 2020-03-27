<?php

namespace App\Repositories;

use App\Models\Orthopedics;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class OrthopedicsRepository
 * @package App\Repositories
 * @version February 1, 2019, 11:05 am -03
 *
 * @method Orthopedics findWithoutFail($id, $columns = ['*'])
 * @method Orthopedics find($id, $columns = ['*'])
 * @method Orthopedics first($columns = ['*'])
*/
class OrthopedicsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Orthopedics::class;
    }
}
