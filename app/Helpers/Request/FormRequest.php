<?php

namespace App\Helpers\Request;

use App\Exceptions\RequestException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as IlluminateFormRequest;

class FormRequest extends IlluminateFormRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new RequestException($validator);
    }
}