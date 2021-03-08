<?php

namespace App\Exceptions;

use App\Helpers\Response\Constants\Error;
use App\Helpers\Response\Response;
use App\Helpers\Response\Status;
use Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Log;

class RequestException extends Exception
{
    /**
     * @var Validator
     */
    protected $validator;

    /**
     * @var bool
     */
    protected $redirectToBack;


    /**
     * RequestException constructor.
     *
     * @param Validator $validator
     * @param bool $redirectToBack
     */
    public function __construct(Validator $validator, bool $redirectToBack = false)
    {
        $this->validator = $validator;
        $this->redirectToBack = $redirectToBack;
    }


    public function render()
    {
        $messages = $this->validator->errors()->messages();

        $validations = [];
        foreach ($messages as $key => $error) {

            $validations[] = (object)[
                'param' => $key,
                'message' => current($error)
            ];

        }

        if ($this->redirectToBack) {

            $redirect = redirect()->back();

            foreach ($validations as $validation) {
                $redirect->with('validation_' . $validation->param, $validation->message);
            }

            return $redirect;

        }

        $validations = ['validations' => $validations];

        $status = new Status(Error::VALIDATION, $validations);
        return Response::parse($status);
    }

}
