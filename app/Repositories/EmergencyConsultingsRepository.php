<?php

namespace App\Repositories;

use App\Models\EmergencyConsultings;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmergencyConsultingsRepository
 * @package App\Repositories
 * @version May 12, 2018, 12:15 am UTC
 *
 * @method EmergencyConsultings findWithoutFail($id, $columns = ['*'])
 * @method EmergencyConsultings find($id, $columns = ['*'])
 * @method EmergencyConsultings first($columns = ['*'])
*/
class EmergencyConsultingsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'os',
        'doctor',
        'dni',
        'name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return EmergencyConsultings::class;
    }
}
