<?php

namespace App\Models\kairos;

use Eloquent as Model;

/**
 * Class ProductPresentation
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * ProductPresentation Table
 */
class ProductPresentation extends Model
{

    public $connection = 'kairos';

    public $table = 'pre';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ClaveProducto' => 'integer',
        'ClavePresentacion' => 'integer',
        'Descripcion' => 'string',
        'CodigoPAMI' => 'string',
        'CodigoTroquel' => 'string',
        'CodigoIOMA' => 'string',
        'CodigoSIFAR' => 'string',
        'Especificacion' => 'string',
        'ViaAdministracion' => 'string',
        'Medio' => 'string',
        'UsoNormatizado' => 'string',
        'CodigoBarras' => 'string',
        'Estado' => 'string',
        'EsCanasta' => 'string'
    ];

    public function price()
    {
        return $this->belongsTo(PresentationPrice::class,'ClavePresentacion','ClavePresentacion');
    }
}
