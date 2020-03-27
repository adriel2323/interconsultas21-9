<?php

namespace App\Models\Surgerytypes;

use App\Models\BaseModel;
use App\Models\Surgery\SurgeryEventData;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class SurgeryType
 * @package App\Models\Surgerytypes
 * @version January 15, 2019, 1:52 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection doctors
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property \Illuminate\Database\Eloquent\Collection SurgeryEventDatum
 * @property \Illuminate\Database\Eloquent\Collection surgeryEvents
 * @property string description
 */
class SurgeryType extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'surgery_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required'
    ];

    public static $messages = [
        'description.required' => 'Debe ingresar la descripción de la cirugía.'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function surgeryEventData()
    {
        return $this->hasMany(SurgeryEventData::class);
    }
}
