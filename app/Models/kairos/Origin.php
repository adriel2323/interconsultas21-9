<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class Origin
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * Origin Table
 */
class Origin extends Model
{

    public $connection = 'kairos';

    public $table = 'origenes';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'integer',
        'valor' => 'string'
    ];

    public function products()
    {
        return $this->hasMany(Products::class, 'CodigoOrigen');
    }
}
