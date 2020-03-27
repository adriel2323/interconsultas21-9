<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Os
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection ConsultingRoomBiopsy
 * @property \Illuminate\Database\Eloquent\Collection InternshipBiopsy
 * @property \Illuminate\Database\Eloquent\Collection users
 * @property string name
 */
class Os extends BaseModel
{

    public $table = 'os';
    
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
        'name' => 'required|unique:os,name'
    ];

    public static $messages = [
        'name.required' => 'El campo "Nombre" es obligatorio.',
        'name.unique' => 'La Obra Social ingresada ya existe en la base de datos.',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function consultingRoomBiopsies()
    {
        return $this->hasMany(\App\Models\ConsultingRoomBiopsy::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function internshipBiopsies()
    {
        return $this->hasMany(\App\Models\InternshipBiopsy::class);
    }
}
