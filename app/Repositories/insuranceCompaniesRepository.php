<?php

namespace App\Repositories;

use App\Models\insuranceCompanies;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class insuranceCompaniesRepository
 * @package App\Repositories
 * @version February 1, 2019, 9:00 am -03
 *
 * @method insuranceCompanies findWithoutFail($id, $columns = ['*'])
 * @method insuranceCompanies find($id, $columns = ['*'])
 * @method insuranceCompanies first($columns = ['*'])
*/
class insuranceCompaniesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'address',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return insuranceCompanies::class;
    }
}
