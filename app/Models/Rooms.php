<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Rooms extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'rooms';

    public $fillable = [
        'name',
        'bed_count'
    ];
}
