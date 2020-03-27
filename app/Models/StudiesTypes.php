<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class StudiesTypes
 * @package App\Models
 * @version May 15, 2018, 5:55 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection emergencyConsultings
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property float price
 */
class StudiesTypes extends Model
{

    public $table = 'studies_types';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'float'
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

    
}
