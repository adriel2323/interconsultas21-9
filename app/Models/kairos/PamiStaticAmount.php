<?php

namespace App\Models\kairos;
use Eloquent as Model;

/**
 * Class PamiStaticAmount
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * PamiStaticAmount Table
 */
class PamiStaticAmount extends Model
{

    public $connection = 'kairos';

    public $table = 'pam';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ClaveProducto' => 'integer',
        'ClavePresentacion' => 'integer',
        'Precio' => 'string'
    ];
}
