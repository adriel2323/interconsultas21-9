<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class WebNews
 * @package App\Models
 * @version February 4, 2019, 1:44 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection doctors
 * @property \Illuminate\Database\Eloquent\Collection instrumentistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection nursesSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rxSpecialistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEvents
 * @property string image_url
 * @property string title
 * @property string short_description
 * @property string extended_description
 */
class WebNews extends Model
{
    use SoftDeletes;
    use Userstamps;

    public $connection = "mysql";
    public $table = 'web_news';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'image_url',
        'title',
        'short_description',
        'extended_description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'image_url' => 'string',
        'title' => 'string',
        'short_description' => 'string',
        'extended_description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        
    ];

    
}
