<?php

namespace App\Helpers\Response;

use App\Helpers\Response\Builders\ResponseBuilder;
use App\Helpers\Response\UseCases\ResponseUseCase;

class Response extends ResponseUseCase
{
    /**
     * @param ResponseBuilder $builder
     *
     * @return Builders\ResponseData|\Illuminate\Http\JsonResponse
     */
    public function handle(ResponseBuilder $builder)
    {
        return $builder->parseToResponse($builder);
    }

}
