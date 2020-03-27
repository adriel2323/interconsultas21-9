<?php

namespace App\Repositories;

use App\Models\PALaboratorySample;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PALaboratorySampleRepository
 * @package App\Repositories
 * @version June 12, 2019, 12:15 pm -03
 *
 * @method PALaboratorySample findWithoutFail($id, $columns = ['*'])
 * @method PALaboratorySample find($id, $columns = ['*'])
 * @method PALaboratorySample first($columns = ['*'])
*/
class PALaboratorySampleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'code',
        'patient_id',
        'department_id',
        'cdi_date_id',
        'surgery_event_id',
        'received_at',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PALaboratorySample::class;
    }
}
