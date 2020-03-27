<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Location extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'Localidades';

    public $casts = [
        'Id' => 'integer',
        'Descripcion' => 'string'
    ];
}
