<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class ExitReason extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'MotivoDeEgreso';

    public $casts = [
        'Id' => 'integer',
        'Descripcion' => 'string'
    ];
}
