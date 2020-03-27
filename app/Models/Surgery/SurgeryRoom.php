<?php

namespace App\Models\Surgery;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class SurgeryRoom extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    protected $table = 'surgery_rooms';

    public $fillable = ['name'];

    public $casts = [
        'name' => 'string'
    ];
}
