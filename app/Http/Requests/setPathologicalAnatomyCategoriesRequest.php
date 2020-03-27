<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class setPathologicalAnatomyCategoriesRequest extends FormRequest
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
        Log::debug($this->get('pathology_category_class_one_id'));
        Log::debug($this->get('pathology_category_class_two_id'));
        Log::debug($this->get('pathology_category_class_three_id'));
        Log::debug($this->get('pathology_category_class_four_id'));

        /*$rules = [
            'pathology_category_class_one_id' => 'required',
            'pathology_category_class_two_id' => 'required',
            'pathology_category_class_three_id' => 'required',
            'pathology_category_class_four_id' => 'required'
        ];*/

        $rules = [];

        return $rules;
    }

    public function messages()
    {
        $messages = array(
            'pathology_category_class_one_id.required' => 'Debe seleccionar la categoría nivel I',
            'pathology_category_class_two_id.required' => 'Debe seleccionar la categoría nivel II',
            'pathology_category_class_three_id.required' => 'Debe seleccionar la categoría nivel III',
            'pathology_category_class_four_id.required' => 'Debe seleccionar la categoría nivel IV'
        );
        return $messages;
    }
}
