<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class Drugs
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * Drugs Table
 */
class Drugs extends Model
{

    public $connection = 'kairos';

    public $table = 'dro';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Clave' => 'integer',
        'Descripcion' => 'string',
        'Estado' => 'string'
    ];

    public function products()
    {
        return $this->belongsToMany(Products::class,'drp','ClaveProducto','ClaveDroga')->withPivot(['Especificacion','ViaAdministracion','Medio','Importancia']);
    }
}
