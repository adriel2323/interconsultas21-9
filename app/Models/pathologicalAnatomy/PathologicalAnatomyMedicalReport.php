<?php

namespace App\Models\pathologicalAnatomy;

use App\Models\BaseModel;
use App\Models\PALaboratorySample;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class PathologicalAnatomyMedicalReport extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'pathological_anatomy_medical_report';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'pathological_anatomy_laboratory_sample_id',
        'medical_report',
        'validated_at',
        'validated_by'
    ];

    public function pathologicalAnatomyLaboratorySample()
    {
        return $this->belongsTo(PALaboratorySample::class, 'pathological_anatomy_laboratory_sample_id');
    }

    public function validatedBy()
    {
        return $this->belongsTo(User::class, 'validated_by');
    }
}
