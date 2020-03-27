<?php

namespace App\Http\Requests\Surgery;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateCommentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->hasPermissionTo('surgery.updateSurgeryComments')) {
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
        return [
            'comments' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'comments.required' => 'Debe escribir algún comentario.'
        ];
    }
}
