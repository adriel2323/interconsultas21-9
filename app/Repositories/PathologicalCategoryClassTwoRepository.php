<?php

namespace App\Repositories;

use App\Models\pathologicalAnatomy\PathologicalCategoryClassTwo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PathologicalCategoryClassOneRepository
 * @package App\Repositories
 * @version May 30, 2019, 11:32 am -03
 *
 * @method PathologicalCategoryClassTwo findWithoutFail($id, $columns = ['*'])
 * @method PathologicalCategoryClassTwo find($id, $columns = ['*'])
 * @method PathologicalCategoryClassTwo first($columns = ['*'])
 * @method PathologicalCategoryClassTwo childCategories
*/
class PathologicalCategoryClassTwoRepository extends BaseRepository
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
        return PathologicalCategoryClassTwo::class;
    }
}
