<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class Service
 * @package App\Models
 * @version April 20, 2018, 6:10 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property string name
 */
class Service extends BaseModel
{


    public $table = 'services';
    
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
        'name' => 'required|unique:services,name'
    ];

    public static $messages = [
        'name.required' => 'El campo "Nombre" es obligatorio.',
        'name.unique' => 'El servicio ingresado ya existe en la base de datos.',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
