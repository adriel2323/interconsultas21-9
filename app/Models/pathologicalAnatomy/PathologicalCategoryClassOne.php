<?php

namespace App\Models\pathologicalAnatomy;

use App\Models\BaseModel;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class PathologicalCategoryClassOne
 * @package App\Models
 * @version May 30, 2019, 11:32 am -03
 *
 * @property integer code
 * @property string name
 */
class PathologicalCategoryClassOne extends BaseModel
{
    use SoftDeletes;
    use Userstamps;

    public $table = 'pathology_category_class_one';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'code',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'code' => 'integer',
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:pathology_category_class_one,name',
        'code' => 'required'
    ];

    /**
     * Validation messages
     *
     * @var array
     */
    public static $messages = [
        'name.required' => 'Debe completar el campo NOMBRE.',
        'name.unique' => 'El nombre ingresado ya existe en la base de datos.',
        'code.required' => 'Debe completar el campo CÓDIGO.'
    ];

    public function childCategories()
    {
        return $this->hasMany(PathologicalCategoryClassTwo::class, 'pathology_category_class_one_id');
    }

}
