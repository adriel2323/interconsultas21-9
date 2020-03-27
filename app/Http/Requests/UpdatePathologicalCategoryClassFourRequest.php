<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\pathologicalAnatomy\PathologicalCategoryClassFour;

class UpdatePathologicalCategoryClassFourRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->can('pathologyCategoryClassFour.edit')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = PathologicalCategoryClassFour::$rules;
        //$rules['name'] = 'required|unique:pathology_category_class_four,name,' . $this->route()->parameter('pathologicalCategoryClassFour');
        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return PathologicalCategoryClassFour::$messages;
    }
}
