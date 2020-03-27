<?php

namespace App\Models\pathologicalAnatomy;

use App\Models\BaseModel;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class PathologicalCategoryClassTwo
 * @package App\Models
 * @version May 30, 2019, 11:32 am -03
 *
 * @property integer code
 * @property string name
 * @property integer pathology_category_class_two_id
 */
class PathologicalCategoryClassThree extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'pathology_category_class_three';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'name',
        'pathology_category_class_two_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'integer',
        'name' => 'string',
        'pathology_category_class_two_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'code' => 'required',
        'pathology_category_class_two_id' => 'required|exists:pathology_category_class_two,id'
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'name.required' => 'Debe completar el campo NOMBRE.',
        'name.unique' => 'El nombre ingresado ya existe en la base de datos.',
        'code.required' => 'Debe completar el campo CÓDIGO.',
        'pathology_category_class_two_id.required' => 'Debe seleccionar la categoría principal.',
        'pathology_category_class_two_id.exists' => 'La categoría seleccionada es inválida.'
    ];

    public function parentCategory()
    {
        return $this->belongsTo(PathologicalCategoryClassTwo::class,'pathology_category_class_two_id');
    }

    public function childCategories()
    {
        return $this->hasMany(PathologicalCategoryClassFour::class, 'pathology_category_class_three_id');
    }

}
