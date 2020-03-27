<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Doctors extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'Medico';

    public $casts = [
        'Id' => 'integer',
        'ApellidoYNombre' => 'string',
        'FechaBaja' => 'datetime',
        'MotivoBaja' => 'string',
        'Calle' => 'string',
        'Nro' => 'string',
        'Piso' => 'string',
        'Depto' => 'string',
        'CP' => 'string',
        'LocalidadId' => 'integer',
        'Provincia' => 'string',
        'TipoDoc' => 'string',
        'NroDoc' => 'string',
        'FechaNacimiento' => 'datetime',
        'Sexo' => 'string',
        'Telefono' => 'string',
        'Mail' => 'string',
        'CantMinSobreturno' => 'integer',
        'Observaciones' => 'string',
        'IsActive' => 'string',
        'Cuit' => 'string',
        'Retencion' => 'string',
        'Honorarios' => 'string',
        'SoloenTurnos' => 'boolean',
        'Codigo_Interno' => 'string'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(Location::class,'LocalidadId','Id');
    }
}
