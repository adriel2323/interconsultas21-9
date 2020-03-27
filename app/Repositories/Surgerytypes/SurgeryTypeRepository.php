<?php

namespace App\Repositories\Surgerytypes;

use App\Models\Surgerytypes\SurgeryType;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SurgeryTypeRepository
 * @package App\Repositories\Surgerytypes
 * @version January 15, 2019, 1:52 pm -03
 *
 * @method SurgeryType findWithoutFail($id, $columns = ['*'])
 * @method SurgeryType find($id, $columns = ['*'])
 * @method SurgeryType first($columns = ['*'])
*/
class SurgeryTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'description'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SurgeryType::class;
    }
}
