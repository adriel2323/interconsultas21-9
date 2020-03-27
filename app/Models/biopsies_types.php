<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class biopsies_types
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection ConsultingRoomBiopsy
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string name
 */
class biopsies_types extends BaseModel
{
    use SoftDeletes;

    public $table = 'biopsies_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:biopsies_types,name'
    ];

    public static $messages = [
        'name.required' => 'El campo "Nombre" es obligatorio.',
        'name.unique' => 'El tipo de biopsia ingresada ya existe en la base de datos.',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function consultingRoomBiopsies()
    {
        return $this->hasMany(\App\Models\ConsultingRoomBiopsy::class);
    }
}
