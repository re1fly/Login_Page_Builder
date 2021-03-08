<?php

namespace App\Exceptions;

use App\Helpers\Response\Constants\Error;
use App\Helpers\Response\Response;
use App\Helpers\Response\Status;

class ProcessFailedException extends \RuntimeException
{
    /**
     * @var Status
     */
    public $error;


    /**
     * ProcessFailedException constructor.
     *
     * @param string|array|null $error
     * @param string|array|null $info
     */
    public function __construct($error = null, $info = null)
    {
        $this->error = new Status($error, $info);
    }


    /**
     * @return \App\Helpers\Response\Builders\ResponseData|\Illuminate\Http\JsonResponse
     */
    public function render()
    {
        if (!$this->error->status) {
            $this->error->status = $this->defaultStatus();
        }

        return Response::parse($this->error);
    }


    /**
     * @return array
     */
    protected function defaultStatus(): array
    {
        return Error::PROCESS_FAILED;
    }

}
