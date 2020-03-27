<?php

namespace App\Repositories;

use App\Models\Doctor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DoctorRepository
 * @package App\Repositories
 * @version July 26, 2018, 11:30 am -03
 *
 * @method Doctor findWithoutFail($id, $columns = ['*'])
 * @method Doctor find($id, $columns = ['*'])
 * @method Doctor first($columns = ['*'])
*/
class DoctorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'license',
        'cuit',
        'service_id',
        'phone',
        'address',
        'malpractice_ensurance',
        'user_id',
        'name',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Doctor::class;
    }
}
