<?php

namespace App\Repositories;

use App\Models\biopsies_types;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class biopsies_typesRepository
 * @package App\Repositories
 * @version April 20, 2018, 8:09 am UTC
 *
 * @method biopsies_types findWithoutFail($id, $columns = ['*'])
 * @method biopsies_types find($id, $columns = ['*'])
 * @method biopsies_types first($columns = ['*'])
*/
class biopsies_typesRepository extends BaseRepository
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
        return biopsies_types::class;
    }
}
