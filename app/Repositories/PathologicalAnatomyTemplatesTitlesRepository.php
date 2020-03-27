<?php

namespace App\Repositories;

use App\Models\pathologicalAnatomy\PathologicalAnatomyTemplatesTitles;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PathologicalAnatomyTemplatesTitlesRepository
 * @package App\Repositories
 * @version June 6, 2019, 12:34 pm -03
 *
 * @method PathologicalAnatomyTemplatesTitles findWithoutFail($id, $columns = ['*'])
 * @method PathologicalAnatomyTemplatesTitles find($id, $columns = ['*'])
 * @method PathologicalAnatomyTemplatesTitles first($columns = ['*'])
*/
class PathologicalAnatomyTemplatesTitlesRepository extends BaseRepository
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
        return PathologicalAnatomyTemplatesTitles::class;
    }
}
