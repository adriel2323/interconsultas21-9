<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class PsychoDrug
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * PsychoDrug Table
 */
class PsychoDrug extends Model
{

    public $connection = 'kairos';

    public $table = 'psicofarmacos';

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
        return $this->hasMany(Products::class, 'CodigoPsico');
    }
}
