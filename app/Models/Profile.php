<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Profile
 * @package App\Models
 * @version April 20, 2018, 6:10 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection User
 * @property string name
 */
class Profile extends BaseModel
{

    public $table = 'roles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'guard_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'guard_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:roles,name'
    ];

    public static $messages = [
        'name.required' => 'El campo "Nombre" es obligatorio.',
        'name.unique' => 'El perfil ingresado ya existe en la base de datos.',
    ];

}
