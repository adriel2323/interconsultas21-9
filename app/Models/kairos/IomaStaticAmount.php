<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class IomaStaticAmount
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * IomaStaticAmount Table
 */
class IomaStaticAmount extends Model
{

    public $connection = 'kairos';

    public $table = 'iom';

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
