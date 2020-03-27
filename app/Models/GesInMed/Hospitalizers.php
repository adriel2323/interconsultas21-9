<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Hospitalizers extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'HospPor';

    public $casts = [
        'Id' => 'integer',
        'Descripcion' => 'string',
        'state_id' => 'boolean'
    ];
}
