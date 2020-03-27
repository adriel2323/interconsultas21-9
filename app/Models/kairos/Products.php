<?php

namespace App\Models\kairos;

use Eloquent as Model;
use PhpMyAdmin\Server\Status;

/**
 * Class Products
 * @package App\Models
 * @version April 20, 2018, 8:09 am UTC
 * Products Table
 */
class Products extends Model
{

    public $connection = 'kairos';

    public $table = 'pro';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Clave' => 'integer',
        'Descripcion' => 'string',
        'ClaveLab' => 'int',
        'ClaveLabCom' => 'int',
        'CodigoOrigen' => 'string',
        'CodigoPsico' => 'string',
        'CodigoVenta' => 'string',
        'CodigoEstup' => 'string',
        'Estado' => 'string'
    ];


    public function presentation()
    {
        return $this->hasMany(ProductPresentation::class, 'ClaveProducto', 'Clave');
    }

    public function presentationPrice()
    {
        return $this->hasMany(PresentationPrice::class, 'ClaveProducto', 'Clave');
    }

    public function drug()
    {
        return $this->belongsToMany(Drugs::class,'drp','ClaveDroga','ClaveProducto')->withPivot(['Especificacion','ViaAdministracion','Medio','Importancia']);
    }

    public function iomaStaticAmount()
    {
        return $this->hasOne(IomaStaticAmount::class,'ClaveProducto');
    }

    public function productionLaboratory()
    {
        return $this->belongsTo(Laboratory::class,'ClaveLab', 'Clave');
    }

    public function marketerLaboratory()
    {
        return $this->belongsTo(Laboratory::class,'ClaveLabCom', 'Clave');
    }

    public function origin()
    {
        return $this->belongsTo(Origin::class, 'CodigoOrigen');
    }

    public function psychodrug()
    {
        return $this->belongsTo(PsychoDrug::class, 'CodigoPsico');
    }

    public function saleCode()
    {
        return $this->belongsTo(SaleCodes::class, 'CodigoVenta');
    }

    public function narcoticCode()
    {
        return $this->belongsTo(NarcoticCode::class, 'CodigoEstup');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'Estado');
    }

    public function price()
    {
        return $this->belongsTo(PresentationPrice::class, 'Clave' ,'ClaveProducto');
    }
}
