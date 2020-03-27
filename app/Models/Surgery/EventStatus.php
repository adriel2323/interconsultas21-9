<?php

namespace App\Models\Surgery;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class EventStatus extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'event_status';
}
