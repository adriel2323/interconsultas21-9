<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Patients extends BaseModel
{
    protected $connection = 'Padron';

    public $table = 'Gente';

    public $casts = [
        'cuil' => 'integer',
        'documento' => 'string',
        'cuil_real' => 'string',
        'apellido' => 'string',
        'sexo' => 'integer',
        'telefono' => 'string',
        'cuit' => 'string',
        'calle' => 'string',
        'numero' => 'string',
        'piso' => 'string',
        'depto' => 'string',
        'localidad' => 'string',
        'provincia' => 'integer',
        'fecha_nacimiento' => 'date',
        'HC_UOM_CENTRAL' => 'string',
        'CodOS' => 'int'
    ];

    public function medicalInsurance()
    {
        return $this->belongsTo(Os::class,'CodOS');
    }
}
