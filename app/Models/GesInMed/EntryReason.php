<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class EntryReason extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'MotivoIngreso';

    public $casts = [
        'Id' => 'integer',
        'Descripcion' => 'string',
        'state_id' => 'integer'
    ];
}
