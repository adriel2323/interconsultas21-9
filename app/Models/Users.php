<?php

namespace App\Models;

use App\Models\BaseModel;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Wildside\Userstamps\Userstamps;

/**
 * Class Users
 * @package App\Models
 * @version April 19, 2018, 8:33 am UTC
 *
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 */
class Users extends BaseModel
{
    protected $dateFormat = 'Y-m-dTH:i:s';

    use HasRoles;
    use SoftDeletes;

    protected $guard_name = 'web';

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'email',
        'password',
        'signature_image'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required|unique:users,email',
        'password' => 'required|min:6',
        'repeat_password' =>'same:password',
        'role' => 'required',
    ];

    public static $messages = [
        'name.required' => "El campo 'Nombre y Apellido' es obligatorio.",
        'email.required' => 'El campo "Email" es obligatorio.',
        'email.unique' => 'El "Email" ingresado ya corresponde a un registro en nuestra base de datos.',
        'password.required' => 'El campo "Contraseña" es obligatorio',
        'password.min' => 'El campo "Contraseña" debe contener como mínimo 6 caracteres.',
        'repeat_password.same' => 'Las contraseñas no coinciden.',
        'role.required' => 'El campo "Perfil" es obligatorio',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function doctor()
    {
        return $this->hasOne(Doctor::class,'user_id');
    }

}
