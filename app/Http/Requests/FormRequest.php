<?php

namespace App\Http\Requests;

use App\Exceptions\RequestException;
use Illuminate\Foundation\Http\FormRequest as CustomFormRequest;

class FormRequest extends CustomFormRequest
{
    public function rules()
    {
        return [
            'form' => 'required'
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new RequestException($validator);
    }

}
