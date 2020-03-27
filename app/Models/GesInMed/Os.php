<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Os extends BaseModel
{
    public $connection = 'Hospital';

    public $table = 'ObraSocial';

    public $casts = [
        'Id' => 'integer',
        'Descripcion' => 'string',
        'Activo' => 'boolean',
        'Direccion' => 'string',
        'CUIT' => 'string',
        'PrecioGuardia' => 'integer',
        'ImprimeHono' => 'boolean',
        'RendicionAcindar' => 'boolean',
        'EsART' => 'boolean',
        'AnestesistaValorFact' => 'boolean',
    ];

    public function DerivativeDoctors()
    {
        return $this->hasMany(ImagesTurns::class,'IMG_TURNO_OBRASOCIAL','Id');
    }
}
