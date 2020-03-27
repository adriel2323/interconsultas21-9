<?php

namespace App\Models\Accounting;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Vendor extends BaseModel
{
    use Userstamps;
    use SoftDeletes;

    public $table = 'accounting_vendors';

    public $fillable = [
        'fantasy_name',
        'pay_name',
        'cuit',
        'address'
    ];
}
