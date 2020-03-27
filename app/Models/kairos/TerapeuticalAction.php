<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class TerapeuticalAction
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * Terapeutical Actions Table
 */
class TerapeuticalAction extends Model
{

    public $connection = 'kairos';

    public $table = 'ate';

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
        return $this->belongsToMany(Products::class,'atp','ClaveProducto','ClaveAccion')->withPivot(['Especificacion','ViaAdministracion','Medio','Importancia']);
    }
}
