<?php

namespace App\Repositories;

use App\Models\pathologicalAnatomy\PathologicalCategoryClassFour;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PathologicalCategoryClassOneRepository
 * @package App\Repositories
 * @version May 30, 2019, 11:32 am -03
 *
 * @method PathologicalCategoryClassFour findWithoutFail($id, $columns = ['*'])
 * @method PathologicalCategoryClassFour find($id, $columns = ['*'])
 * @method PathologicalCategoryClassFour first($columns = ['*'])
*/
class PathologicalCategoryClassFourRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'pathology_category_class_one_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PathologicalCategoryClassFour::class;
    }
}
