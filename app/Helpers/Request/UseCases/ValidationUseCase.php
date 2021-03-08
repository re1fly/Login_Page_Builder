<?php

namespace App\Helpers\Request\UseCases;

use App\Helpers\Request\Builders\ValidationBuilder;
use App\Models\HotspotLoginForm;
use Illuminate\Http\Request;

abstract class ValidationUseCase
{
    /**
     * @param Request|array $request
     * @param array $rules
     * @param bool $redirectBack
     */
    public static function request($request, array $rules, bool $redirectBack = false)
    {
        $builder = new ValidationBuilder();
        $builder->setRequest($request);
        $builder->setRules($rules);
        $builder->setErrorRedirectToBack($redirectBack);

        return (new static)->handle($builder);
    }


    /**
     * @param HotspotLoginForm $loginForm
     * @param Request|array $request
     * @param bool $redirectBack
     */
    public static function loginFormRequest(HotspotLoginForm $loginForm, $request, bool $redirectBack = false)
    {
        $builder = new ValidationBuilder();
        $builder->setLoginForm($loginForm);
        $builder->setRequest($request);
        $builder->setErrorRedirectToBack($redirectBack);

        return (new static)->handle($builder);
    }

    abstract public function handle(ValidationBuilder $builder);

}