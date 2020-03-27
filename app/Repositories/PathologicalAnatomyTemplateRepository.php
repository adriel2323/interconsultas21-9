<?php

namespace App\Repositories;

use App\Models\pathologicalAnatomy\PathologicalAnatomyTemplate;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PathologicalAnatomyTemplateRepository
 * @package App\Repositories
 * @version June 7, 2019, 11:18 am -03
 *
 * @method PathologicalAnatomyTemplate findWithoutFail($id, $columns = ['*'])
 * @method PathologicalAnatomyTemplate find($id, $columns = ['*'])
 * @method PathologicalAnatomyTemplate first($columns = ['*'])
*/
class PathologicalAnatomyTemplateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'template_category_id',
        'code',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PathologicalAnatomyTemplate::class;
    }
}
