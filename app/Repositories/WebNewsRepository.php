<?php

namespace App\Repositories;

use App\Models\WebNews;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WebNewsRepository
 * @package App\Repositories
 * @version February 4, 2019, 1:44 pm -03
 *
 * @method WebNews findWithoutFail($id, $columns = ['*'])
 * @method WebNews find($id, $columns = ['*'])
 * @method WebNews first($columns = ['*'])
*/
class WebNewsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image_url',
        'title',
        'short_description',
        'extended_description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return WebNews::class;
    }
}
