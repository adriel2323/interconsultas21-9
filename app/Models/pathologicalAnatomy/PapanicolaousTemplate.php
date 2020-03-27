<?php

namespace App\Models\pathologicalAnatomy;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class PapanicolaousTemplate extends BaseModel
{
    use Userstamps;
    use SoftDeletes;

    public $table = 'pathological_anatomy_papanicolaous_templates';

    public $fillable = [
        'category',
        'description'
    ];

    protected $casts = [
        'id' => 'int',
        'code' => 'int',
        'description' => 'string'
    ];

    public static $rules = [

    ];

    public static $messages = [
    ];
}
