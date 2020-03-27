<?php

namespace App\Models\employeesModule;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

class Employee extends Model
{
    use SoftDeletes;
    use Userstamps;

    protected $connection = 'personal';

    public $table = 'employees';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'department_id',
        'os_id',
        'task_id',
        'bank_account_type_id',
        'payment_modality_id',
        'category_id',
        'marital_status_id',
        'genre_id',
        'bank_id',
        'expedient_number',
        'name',
        'last_name',
        'mother_last_name',
        'address',
        'address_number',
        'floor_number',
        'apartment_number',
        'tower_number',
        'block_number',
        'location_id',
        'postal_code',
        'email',
        'document_number',
        'nationality',
        'birthday',
        'mate_lastname',
        'cuil',
        'position',
        'confidential',
        'chief',
        'working_time',
        'night_shift_from_time',
        'night_shift_to_time',
        'flexible_shift',
        'has_to_sign_entrance',
        'extra_shifts_authorized',
        'left_before_end_authorized',
        'personal_control_authorized',
        'extra_shift_unit_payment',
        'shift_unit_payment',
        'extra_shift_fraction_payment',
        'discount_fraction',
        'count_night_shift_hours',
        'discapacity',
        'student',
        'art_id',
        'syndicate_id',
        'syndicate_affiliate_number',
        'regimen',
        'os_afilliate_number',
        'salary',
        'salary_last_revision',
        'seat_model',
        'cbu',
        'bank_account_number',
        'down_code',
        'formation_level',
        'vacations_additional_days',
        'up_date',
        'down_date',
        'down_cause',
        'telegram_date',
        'affect_seniority',
        'observations'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'department_id' => 'integer',
        'os_id' => 'integer',
        'task_id' => 'integer',
        'bank_account_type_id' => 'integer',
        'payment_modality_id' => 'integer',
        'category_id' => 'integer',
        'marital_status_id' => 'integer',
        'genre_id' => 'integer',
        'bank_id' => 'integer',
        'expedient_number' => 'integer',
        'name' => 'string',
        'last_name' => 'string',
        'mother_last_name' => 'string',
        'address' => 'string',
        'address_number' => 'integer',
        'floor_number' => 'integer',
        'apartment_number' => 'integer',
        'tower_number' => 'integer',
        'block_number' => 'integer',
        'location_id' => 'integer',
        'postal_code' => 'integer',
        'email' => 'string',
        'document_number' => 'string',
        'nationality' => 'string',
        'birthday' => 'date',
        'mate_lastname' => 'string',
        'cuil' => 'string',
        'position' => 'string',
        'confidential' => 'boolean',
        'chief' => 'boolean',
        'working_time' => 'string',
        'night_shift_from_time' => 'string',
        'night_shift_to_time' => 'string',
        'flexible_shift' => 'boolean',
        'has_to_sign_entrance' => 'boolean',
        'extra_shifts_authorized' => 'boolean',
        'left_before_end_authorized' => 'boolean',
        'personal_control_authorized' => 'boolean',
        'extra_shift_unit_payment' => 'string',
        'shift_unit_payment' => 'string',
        'extra_shift_fraction_payment' => 'string',
        'discount_fraction' => 'string',
        'count_night_shift_hours' => 'boolean',
        'discapacity' => 'boolean',
        'student' => 'boolean',
        'art_id' => 'integer',
        'syndicate_id' => 'integer',
        'syndicate_affiliate_number' => 'string',
        'regimen' => 'integer',
        'os_afilliate_number' => 'string',
        'salary' => 'float',
        'salary_last_revision' => 'date',
        'seat_model' => 'string',
        'cbu' => 'string',
        'bank_account_number' => 'string',
        'down_code' => 'string',
        'formation_level' => 'integer',
        'vacations_additional_days' => 'string',
        'up_date' => 'date',
        'down_date' => 'date',
        'down_cause' => 'string',
        'telegram_date' => 'string',
        'affect_seniority' => 'boolean',
        'observations' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'expedient_number' => 'required',
        'name' => 'required',
        'last_name' => 'required',
        'document_number' => 'required',
        'category_id' => 'required|exists:employees_categories,id',
        'os_id' => 'required|exists:os,id',
        'up_date' => 'required|date'
    ];

    public static $messages = [
        'expedient_number.required' => 'El campo "Legajo" es obligatorio.',
        'name.required' => 'El campo "Nombre" es obligatorio.',
        'last_name.required' => 'El campo "Apellido" es obligatorio',
        'document_number.required' => 'El campo "DNI" es obligatorio.',
        'category_id.required' => 'Debe seleccionar la Categoría a la que pertenece el empleado.',
        'category_id.exists' => 'La categoría de empleado seleccionada es inválida.',
        'os_id.required' => 'Debe seleccionar la Obra Social que se le asignará al empleado.',
        'os_id.exists' => 'La obra social seleccionada es inválida.',
        'up_date.required' => 'Debe ingresar la fecha de alta del empleado.',
        'up_date.date' => 'El valor del campo "Fecha de alta" debe tener formato de fecha.'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function art()
    {
        return $this->belongsTo(\App\Models\Art::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bankAccountType()
    {
        return $this->belongsTo(\App\Models\BankAccountType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function bank()
    {
        return $this->belongsTo(BankAccount::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function employeesCategory()
    {
        return $this->belongsTo(\App\Models\EmployeeCategory::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function genre()
    {
        return $this->belongsTo(\App\Models\Genre::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function maritalStatus()
    {
        return $this->belongsTo(\App\Models\MaritalStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function os()
    {
        return $this->belongsTo(\App\Models\Os::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function paymentModality()
    {
        return $this->belongsTo(\App\Models\PaymentModality::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function syndicate()
    {
        return $this->belongsTo(\App\Models\Syndicate::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function employeesTask()
    {
        return $this->belongsTo(\App\Models\EmployeesTask::class);
    }

    public function getFullNameAttribute()
    {
        return $this->last_name . ', ' . $this->name ;
    }

    public function news()
    {
        return $this->hasMany(News::class, "employee_id");
    }

}
