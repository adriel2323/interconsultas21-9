<?php

namespace App\Models\Nomenclator;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class NomenclatorPractice extends BaseModel
{
    public $table = 'nomenclator';

    public $fillable = [
        'code',
        'description',
        'honorary_units',
        'helper_honorary_units',
        'anesthesist_honorary_units',
        'expenses_units'
    ];
}
