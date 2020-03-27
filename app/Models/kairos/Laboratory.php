<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class Laboratory
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * Laboratory Table
 */
class Laboratory extends Model
{

    public $connection = 'kairos';

    public $table = 'lab';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Clave' => 'integer',
        'Descripcion' => 'string',
        'RazonSocial' => 'string',
        'Estado' => 'string'
    ];
}
