<?php

namespace App\Helpers\Response\Interfaces;

use App\Helpers\Response\Builders\ResponseBuilder;
use App\Helpers\Response\Status;

interface ResponseInterface
{
    /**
     * @param Status $status
     */
    public function setStatus(Status $status);

    /**
     * @param $data
     */
    public function setData($data);

    /**
     * Return response to object
     */
    public function toObject();

    /**
     * @param ResponseBuilder $builder
     */
    public function parseToResponse(ResponseBuilder $builder);

}
