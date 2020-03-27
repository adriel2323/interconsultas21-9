<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\pathologicalAnatomy\PathologicalCategoryClassTwo;

class UpdatePathologicalCategoryClassTwoRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->can('pathologyCategoryClassTwo.edit')) {
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
        $rules = PathologicalCategoryClassTwo::$rules;
        //$rules['name'] = 'required|unique:pathology_category_class_two,name,' . $this->route()->parameter('pathologicalCategoryClassTwo');
        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return PathologicalCategoryClassTwo::$messages;
    }
}
