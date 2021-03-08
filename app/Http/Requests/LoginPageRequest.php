<?php

namespace App\Http\Requests;

use App\Helpers\Request\FormRequest;

class LoginPageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'company' => 'required|string|max:100',
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:250',
            'logo' => 'file|mimes:jpeg,jpg,png,ico,bmp|nullable',
            'background' => 'file|mimes:jpeg,jpg,png,bmp|nullable',
            'fontColor' => 'string|max:15|nullable',
            'secondaryColor' => 'string|max:15|nullable',
            'font' => 'string|max:15|nullable',
            'opacity' => 'string|max:5|nullable',
        ];
    }
}
