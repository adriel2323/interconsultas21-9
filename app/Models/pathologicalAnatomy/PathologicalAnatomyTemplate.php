<?php

namespace App\Models\pathologicalAnatomy;

use App\Models\BaseModel;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class PathologicalAnatomyTemplate
 * @package App\Models
 * @version June 7, 2019, 11:18 am -03
 *
 * @property \App\Models\pathologicalAnatomy\PathologicalAnatomyTemplatesTitle
 * @property \Illuminate\Database\Eloquent\Collection instrumentistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection nursesSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rxSpecialistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property integer template_category_id
 * @property string code
 * @property string description
 * @property integer created_by
 * @property integer updated_by
 * @property integer deleted_by
 */
class PathologicalAnatomyTemplate extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'pathological_anatomy_templates';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'template_category_id',
        'code',
        'description',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'template_category_id' => 'integer',
        'code' => 'string',
        'description' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer',
        'deleted_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'code' => 'required|unique:pathological_anatomy_templates,code,NULL,id,deleted_at,NULL',
        'description' => 'required'
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'code.required' => 'Debe ingresar el código de template.',
        'code.unique' => 'El código ingresado ya existe en la base de datos.',
        'description.required' => 'Debe ingresar el cuerpo de la plantilla.'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pathologicalAnatomyTemplatesTitle()
    {
        return $this->belongsTo(PathologicalAnatomyTemplatesTitles::class);
    }

    public function getShowNameAttribute()
    {
        return $this->code . " " .substr($this->description, 0, 20) . "...";
    }
}
