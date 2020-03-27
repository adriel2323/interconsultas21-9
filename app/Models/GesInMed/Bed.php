<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Bed extends BaseModel
{
    public $connection = 'Hospital';

    public $table = 'Cama';

    public $casts = [
        'Id' => 'integer',
        'Descripcion' => 'string',
        'state_id' => 'integer',
        'SalaId' => 'integer',
        'Eliminada' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function room()
    {
        return $this->belongsTo(Room::class,'SalaId','Id');
    }
}
