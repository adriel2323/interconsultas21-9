<?php

namespace App\Http\Requests\Accounting\checks;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Accounting\AccountingCheck;

class UpdateAccountingCheckRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return AccountingCheck::$rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return AccountingCheck::$messages;
    }
}
