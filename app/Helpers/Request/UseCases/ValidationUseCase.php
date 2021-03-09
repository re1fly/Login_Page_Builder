<?php

namespace App\Helpers\Request\UseCases;

use App\Helpers\Request\Builders\ValidationBuilder;
use App\Models\HotspotLoginForm;
use Illuminate\Http\Request;

abstract class ValidationUseCase
{
    /**
     * @param Request|array $request
     * @param array|HotspotLoginForm $rules
     * @param bool $redirectBack
     */
    public static function request($request, $rules, bool $redirectBack = false)
    {
        $builder = new ValidationBuilder();
        $builder->setRequest($request);
        $builder->setRules($rules);
        $builder->setErrorRedirectToBack($redirectBack);

        return (new static)->handle($builder);
    }

    abstract public function handle(ValidationBuilder $builder);

}