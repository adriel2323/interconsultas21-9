<?php

namespace App\Models\Accounting;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Wildside\Userstamps\Userstamps;

/**
 * Class Receipts
 * @package App\Models\Accounting
 * @version September 30, 2018, 5:02 pm -03
 *
 * @property \Illuminate\Database\Eloquent\Collection doctors
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string number
 * @property float amount
 * @property string company
 * @property string comments
 */
class Receipts extends Model
{

    use SoftDeletes;
    use Userstamps;

    public $table = 'receipts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'number',
        'amount',
        'company',
        'comments',
        'receipt_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'string',
        'amount' => 'float',
        'company' => 'string',
        'comments' => 'string',
        'receipt_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required',
        'amount' => 'required|min:0',
        'company' => 'required',
        'receipt_date' => 'required'
    ];

    public static $messages = [
        'number.required' => 'Debe ingresar el número de recibo.',
        'amount.required' => 'Debe ingresar el monto del recibo.',
        'amount.min' => 'El monto debe ser mayor a 0.',
        'company.required' => 'Debe ingresar la persona / empresa que entrega el dinero.',
        'receipt_date.required' => 'Debe ingresar la fecha del recibo'
    ];

    
}
