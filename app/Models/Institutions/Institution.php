<?php

namespace App\Models\Institutions;

use App\Models\BaseModel;
use App\Models\PALaboratorySample;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Institution extends BaseModel
{
    use Userstamps;
    use SoftDeletes;

    public $table = "institutions";

    public $fillable = [
        'name',
        'phone',
        'address',
        'contact_name'
    ];

    public static $rules = [
      'name' => 'required'
    ];

    public static $messages = [
        'name.required' => 'Debe ingresar el nombre de la institución.'
    ];

    public function PALaboratorySample()
    {
        $this->hasMany(PALaboratorySample::class, 'institution_id');
    }
}
