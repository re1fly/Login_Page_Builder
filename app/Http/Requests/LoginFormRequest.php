<?php

namespace App\Http\Requests;

use App\Helpers\Request\FormRequest;

class LoginFormRequest extends FormRequest
{
    public function rules()
    {
        return [
                'google' => 'required|boolean',
                'facebook' => 'required|boolean',
                'twitter' => 'required|boolean',
                'github' => 'required|boolean',
                'forms' => 'required|array|min:2'
            ] + $this->formRules();
    }

    private function formRules()
    {
        return [
            'forms.*.name' => 'required|string',
            'forms.*.typeId' => 'required|integer',
            'forms.*.icon' => 'string|nullable',
            'forms.*.values' => 'array|nullable',
            'forms.*.values.*' => 'string|nullable',
            'forms.*.validations' => 'required|array|between:4,4',
            'forms.*.validations.typeId' => 'required|integer',
            'forms.*.validations.required' => 'required|boolean',
            'forms.*.validations.date_format' => 'string|nullable',
            'forms.*.validations.nullable' => 'required|boolean',
        ];
    }
}
