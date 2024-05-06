<?php

namespace Modules\Colaborators\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateColaboratorClassificationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'classificationName' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'classificationName.required' => 'Campo obrigatório'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
