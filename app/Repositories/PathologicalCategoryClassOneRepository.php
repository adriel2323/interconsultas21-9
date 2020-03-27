<?php

namespace App\Repositories;

use App\Models\pathologicalAnatomy\PathologicalCategoryClassOne;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PathologicalCategoryClassOneRepository
 * @package App\Repositories
 * @version May 30, 2019, 11:32 am -03
 *
 * @method PathologicalCategoryClassOne findWithoutFail($id, $columns = ['*'])
 * @method PathologicalCategoryClassOne find($id, $columns = ['*'])
 * @method PathologicalCategoryClassOne first($columns = ['*'])
*/
class PathologicalCategoryClassOneRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PathologicalCategoryClassOne::class;
    }
}
