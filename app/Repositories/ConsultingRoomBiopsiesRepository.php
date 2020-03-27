<?php

namespace App\Repositories;

use App\Models\ConsultingRoomBiopsies;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConsultingRoomBiopsiesRepository
 * @package App\Repositories
 * @version April 20, 2018, 9:39 am UTC
 *
 * @method ConsultingRoomBiopsies findWithoutFail($id, $columns = ['*'])
 * @method ConsultingRoomBiopsies find($id, $columns = ['*'])
 * @method ConsultingRoomBiopsies first($columns = ['*'])
*/
class ConsultingRoomBiopsiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'patient_name',
        'biopsy_type',
        'doctor',
        'os',
        'biopsy_number',
        'delivery_date',
        'autorized_order',
        'patologist'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConsultingRoomBiopsies::class;
    }
}
