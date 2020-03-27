<?php

namespace App\Models\pathologicalAnatomy;

use App\Models\BaseModel;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class PathologicalAnatomyTemplatesTitles
 * @package App\Models
 * @version June 6, 2019, 12:34 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection instrumentistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection nursesSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property \Illuminate\Database\Eloquent\Collection rxSpecialistsSurgeryParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryDoctorParticipation
 * @property \Illuminate\Database\Eloquent\Collection surgeryEventAnesthesistParticipation
 * @property string name
 */
class PathologicalAnatomyTemplatesTitles extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'pathological_anatomy_templates_titles';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:pathological_anatomy_templates_titles,name',
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'name.required' => 'Debe ingresar el nombre de la categoría.',
        'name.unique' => 'Ya existe un título con el mismo nombre en la base de datos.'
    ];

    public function templates()
    {
        return $this->hasMany(PathologicalAnatomyTemplate::class, 'template_category_id');
    }

    
}
