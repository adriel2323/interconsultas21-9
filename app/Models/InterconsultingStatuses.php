<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class InterconsultingStatuses extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'interconsulting_statuses';
}
