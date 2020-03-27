<?php

namespace App\Repositories;

use App\Models\pathologicalAnatomy\PathologicalCategoryClassThree;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PathologicalCategoryClassOneRepository
 * @package App\Repositories
 * @version May 30, 2019, 11:32 am -03
 *
 * @method PathologicalCategoryClassThree findWithoutFail($id, $columns = ['*'])
 * @method PathologicalCategoryClassThree find($id, $columns = ['*'])
 * @method PathologicalCategoryClassThree first($columns = ['*'])
*/
class PathologicalCategoryClassThreeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'name',
        'pathology_category_class_two_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PathologicalCategoryClassThree::class;
    }
}
