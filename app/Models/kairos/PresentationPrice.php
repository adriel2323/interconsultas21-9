<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class PresentationPrice
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * PresentationPrice Table
 */
class PresentationPrice extends Model
{

    public $connection = 'kairos';

    public $table = 'prc';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ClaveProducto' => 'integer',
        'ClavePresentacion' => 'integer',
        'PrecioPublico' => 'string',
        'FechaVigencia' => 'string'
    ];

    public function presentation()
    {
        return $this->belongsTo(ProductPresentation::class,'ClavePresentacion','ClavePresentacion');
    }
}
