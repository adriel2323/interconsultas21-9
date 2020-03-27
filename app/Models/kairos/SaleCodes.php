<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class SaleCodes
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * SaleCodes Table
 */
class SaleCodes extends Model
{

    public $connection = 'kairos';

    public $table = 'codigos_venta';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'valor' => 'string'
    ];

    public function products()
    {
        return $this->hasMany(Products::class, 'CodigoVenta');
    }
}
