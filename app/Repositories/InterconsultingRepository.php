<?php

namespace App\Repositories;

use App\Models\Interconsulting;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InterconsultingRepository
 * @package App\Repositories
 * @version July 23, 2018, 1:40 pm -03
 *
 * @method Interconsulting findWithoutFail($id, $columns = ['*'])
 * @method Interconsulting find($id, $columns = ['*'])
 * @method Interconsulting first($columns = ['*'])
*/
class InterconsultingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'requester_id',
        'requested_service_id',
        'requested_doctor_id',
        'status_id',
        'observations'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Interconsulting::class;
    }
}
