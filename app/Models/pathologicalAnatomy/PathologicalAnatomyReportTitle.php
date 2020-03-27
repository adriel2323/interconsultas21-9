<?php

namespace App\Models\pathologicalAnatomy;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class PathologicalAnatomyReportTitle extends BaseModel
{
    public $table = 'pathological_anatomy_report_titles';

    public $fillable = [
        'name'
    ];
}
