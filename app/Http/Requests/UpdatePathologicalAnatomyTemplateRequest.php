<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\pathologicalAnatomy\PathologicalAnatomyTemplate;

class UpdatePathologicalAnatomyTemplateRequest extends FormRequest
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
        $rules = PathologicalAnatomyTemplate::$rules;
        $rules['code'] = 'required|unique:pathological_anatomy_templates,code,'.$this->route()->parameter('pathologicalAnatomyTemplate').',id,deleted_at,NULL';
        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return PathologicalAnatomyTemplate::$messages;
    }
}
