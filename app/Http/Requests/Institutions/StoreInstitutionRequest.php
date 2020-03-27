<?php

namespace App\Http\Requests\Institutions;

use App\Models\Institutions\Institution;
use Illuminate\Foundation\Http\FormRequest;

class StoreInstitutionRequest extends FormRequest
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
        return Institution::$rules;
    }

    public function messages()
    {
        return Institution::$messages;
    }
}
