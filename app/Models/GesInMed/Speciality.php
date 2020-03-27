<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Speciality extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'Especialidad';

    public $casts = [
        'Id' => 'integer',
        'Descripcion' => 'string',
        'Especialidad_Activa' => 'string',
        'Turnos' => 'boolean',
        'Mostrar_en_Imagenes' => 'boolean',
        'Mostrar_Reporte_Guardia' => 'boolean'
    ];
}
