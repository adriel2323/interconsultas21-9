<?php

namespace App\Models\Surgery;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class SurgeryType extends BaseModel
{
    use Userstamps;
    use SoftDeletes;

    protected $table = 'surgery_types';

    public $fillable = ['description'];

    public $casts = [
        'id' => 'integer',
        'description' => 'string'
    ];

    public static $rules = [
        'description' => 'required'
    ];

    public static $messages = [
      'description.required' => 'Debe ingresar la descripción de la cirugía.'
    ];
}
