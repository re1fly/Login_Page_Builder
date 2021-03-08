<?php

namespace App\Helpers\Response\Builders;

use App\Helpers\Response\Interfaces\ResponseInterface;
use App\Helpers\Response\Status;

class ResponseBuilder implements ResponseInterface
{
    /**
     * @var ResponseData
     */
    public $data;

    /**
     * @var bool
     */
    public $objectData = false;


    /**
     * ResponseBuilder constructor.
     */
    public function __construct()
    {
        $this->data = new ResponseData();
    }


    /**
     * @param Status $status
     */
    public function setStatus(Status $status = null)
    {
        if (!$status) {
            return;
        }

        if (is_array($status->status)) {
            $this->data->status = $status->status[0];
            $this->data->message = $status->status[1];
        }

        if (is_string($status->status)) {
            $this->data->message = $status->status;
        }

        $this->data->info = $status->info;
    }

    /**
     * @param $data
     */
    public function setData($data)
    {
        $this->data->data = $data;
    }

    public function toObject()
    {
        $this->objectData = true;
    }

    /**
     * @param ResponseBuilder $builder
     *
     * @return ResponseData|\Illuminate\Http\JsonResponse
     */
    public function parseToResponse(ResponseBuilder $builder)
    {
        $data = $builder->data;

        if (!$this->objectData) {
            return parse_response_json($data);
        }

        return $data;
    }

}
