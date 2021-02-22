<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Contracts\Validation\Validator;
use Throwable;

class RequestException extends Exception
{
    /**
     * @var Validator
     */
    protected $validator;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    public function render()
    {
        return $this->validator->errors()->getMessages();
    }

}
