<?php

namespace App\Models\employeesModule;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class Department
 * @package App\Models
 * @version July 5, 2018, 2:18 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection employeesCategories
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 */
class ExtraHourRequest extends Model
{
    protected $connection = 'personal';

    use SoftDeletes;
    use Userstamps;

    public $table = 'extra_hours_requests';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'department_id',
        'employee_id',
        'reason_id',
        'covers_employee_id',
        'from',
        'to',
        'comments',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'department_id' => 'integer',
        'employee_id' => 'integer',
        'covers_employee_id' => 'integer',
        'comments' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'department_id' => 'required',
        'employee_id' => 'required',
        'covers_employee_id' => 'required',
        'from' => 'required|after_or_equal:today',
        'to' => 'required|after:from',
        'comments' => 'required'
    ];

    public static $messages = [
        'department_id.required' => 'Debe seleccionar un departamento',
        'employee_id.required' => 'Debe seleccionar el empleado para el cuál solicita las horas extras',
        'covers_employee_id.required' => 'Debe seleccionar a quién se cubrirá',
        'from.required' => 'Debe ingresar la fecha y hora en que comienza la solicitud de turno extra',
        'from.after_or_equal' => 'La fecha DESDE no es válida.',
        'to.required' => 'Debe ingresar la fecha y hora en la que termina la solicitud de turno extra',
        'to.after' => 'La fecha HASTA no es válida.',
        'comments.required' => 'Debe explicar la situación y el por qué considerá que debe trabajarse un turno extra'
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function coveredEmployee()
    {
        return $this->belongsTo(Employee::class, 'covers_employee_id');
    }
    
}
