<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\pathologicalAnatomy\PathologicalAnatomyTemplatesTitles;

class UpdatePathologicalAnatomyTemplatesTitlesRequest extends FormRequest
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
        $rules = PathologicalAnatomyTemplatesTitles::$rules;
        $rules["name"] = 'required|unique:pathological_anatomy_templates_titles,name,' . $this->route()->parameter('paTemplatesTitle');
        return $rules;
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return PathologicalAnatomyTemplatesTitles::$messages;
    }
}
