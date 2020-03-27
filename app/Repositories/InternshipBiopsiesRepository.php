<?php

namespace App\Repositories;

use App\Models\InternshipBiopsies;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InternshipBiopsiesRepository
 * @package App\Repositories
 * @version April 20, 2018, 8:22 am UTC
 *
 * @method InternshipBiopsies findWithoutFail($id, $columns = ['*'])
 * @method InternshipBiopsies find($id, $columns = ['*'])
 * @method InternshipBiopsies first($columns = ['*'])
*/
class InternshipBiopsiesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'patient_name',
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
        return InternshipBiopsies::class;
    }
}
