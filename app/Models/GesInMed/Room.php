<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Room extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'Sala';

    public $casts = [
        'Id' => 'integer',
        'Descripcion' => 'string',
        'state_id' => 'boolean',
        'ServicioId' => 'integer',
        'Eliminada' => 'boolean'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function service()
    {
        return $this->belongsTo(Service::class,'ServicioId','SERV_ID');
    }
}
