<?php

namespace App\Helpers\Request;

use App\Helpers\Request\Builders\ValidationBuilder;
use App\Helpers\Request\UseCases\ValidationUseCase;

class Validation extends ValidationUseCase
{
    /**
     * @param ValidationBuilder $builder
     */
    public function handle(ValidationBuilder $builder)
    {
        $builder->process($builder);
    }
}