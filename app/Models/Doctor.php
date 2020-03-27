<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class Doctor
 * @package App\Models
 * @version July 26, 2018, 11:30 am -03
 *
 * @property \App\Models\Service service
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string license
 * @property string cuit
 * @property integer service_id
 * @property string phone
 * @property string address
 * @property string malpractice_ensurance
 * @property integer user_id
 * @property string name
 * @property string email
 */
class Doctor extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'doctors';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'license' => 'string',
        'cuit' => 'string',
        'service_id' => 'integer',
        'phone' => 'string',
        'address' => 'string',
        'malpractice_ensurance' => 'string',
        'user_id' => 'integer',
        'name' => 'string',
        'email' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public static $messages = [

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(\App\Models\Service::class)->orderBy('name');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\Users::class);
    }
}
