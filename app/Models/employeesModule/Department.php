<?php

namespace App\Models\employeesModule;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class Department
 * @package App\Models
 * @version July 5, 2018, 2:18 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection employeesCategories
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 */
class Department extends Model
{
    protected $connection = 'personal';

    use Userstamps;
    use SoftDeletes;

    public $table = 'departments';
    
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
        'name' => 'required|unique:departments,name'
    ];

    public static $messages = [
        'name.required' => 'El campo "Nombre de Departamento" es obligatorio.',
        'name.unique' => 'El valor del campo "Nombre de Departamento" ya existe en la base de datos.',
    ];

    
}
