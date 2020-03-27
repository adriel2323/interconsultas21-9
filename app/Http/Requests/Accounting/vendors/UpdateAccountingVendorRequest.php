<?php

namespace App\Http\Requests\Accounting\vendors;;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Accounting\AccountingVendor;

class UpdateAccountingVendorRequest extends FormRequest
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
        return AccountingVendor::$rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return AccountingVendor::$messages;
    }
}
