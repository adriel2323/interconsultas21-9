<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class DerivativeDoctors extends BaseModel
{
    public $connection = 'Hospital';

    public $table = 'IMG_MEDICO_DERIVANTE';

    public $casts = [
        'MD_ID' => 'integer',
        'MD_MEDICO' => 'string',
        'MD_MN' => 'string',
        'MD_MP' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function derivativesImages()
    {
        return $this->hasMany(ImagesTurns::class,'IMG_TURNO_MEDICODERIVANTEID','MD_ID');
    }
}
