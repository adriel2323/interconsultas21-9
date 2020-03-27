<?php

namespace App\Models\GesInMed;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    protected $connection = 'Hospital';

    public $table = 'SERVICIOS';

    public $casts = [
        'SERV_ID' => 'integer',
        'SERV_DESRIPCION' => 'string',
        'SERV_ESTADO' => 'integer',
        'SERV_CEN_ID' => 'integer',
        'SERV_RESUM' => 'string',
        'SERV_REPORTA' => 'string',
        'SERV_MAS_DIAS' => 'string',
        'SERV_TERAPIA' => 'string',
        'SERV_ENTREGA_AUTO' => 'string',
        'SERV_ELIMINADO' => 'boolean',
        'SERV_MOSTRAR_LABO' => 'boolean',
    ];
}
