<?php

namespace App\Helpers\Response\UseCases;

use App\Helpers\Response\Builders\ResponseBuilder;
use App\Helpers\Response\Builders\ResponseData;
use App\Helpers\Response\Status;

abstract class ResponseUseCase
{
    /**
     * @param Status|null $status
     * @param null $data
     * @param bool $object
     *
     * @return ResponseData|\Illuminate\Http\JsonResponse
     */
    public static function parse(Status $status = null, $data = null, bool $object = false)
    {
        $builder = new ResponseBuilder();
        $builder->setStatus($status);
        $builder->setData($data);

        if ($object) {
            $builder->toObject();
        }

        return (new static)->handle($builder);
    }

    abstract public function handle(ResponseBuilder $builder);

}
