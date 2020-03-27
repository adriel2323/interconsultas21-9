<?php

namespace App\Models\Accounting;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class CheckPrintingParameters extends BaseModel
{
    public $table = 'accounting_check_printing_parameters';

    public $fillable = ['parameter', 'left', 'top', 'default_left', 'default_top'];

}
