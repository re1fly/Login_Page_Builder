<?php

namespace App\Http\Requests;

use App\Exceptions\RequestException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TemplateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'template' => 'required'
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new RequestException($validator);
    }

}
