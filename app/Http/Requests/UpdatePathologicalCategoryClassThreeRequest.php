<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\pathologicalAnatomy\PathologicalCategoryClassThree;

class UpdatePathologicalCategoryClassThreeRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(\Auth::user()->can('pathologyCategoryClassThree.edit')) {
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
        $rules = PathologicalCategoryClassThree::$rules;
        //$rules['name'] = 'required|unique:pathology_category_class_three,name,' . $this->route()->parameter('pathologicalCategoryClassThree');
        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return PathologicalCategoryClassThree::$messages;
    }
}
