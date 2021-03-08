<?php

namespace App\Helpers\Request\Interfaces;

use App\Helpers\Request\Builders\ValidationBuilder;
use App\Models\HotspotLoginForm;
use Illuminate\Http\Request;

interface ValidationInterface
{
    /**
     * @param Request|array $request
     */
    public function setRequest($request);

    /**
     * @param HotspotLoginForm $loginForm
     */
    public function setLoginForm(HotspotLoginForm $loginForm);

    /**
     * @param array $rules
     */
    public function setRules(array $rules);

    /**
     * @param ValidationBuilder $builder
     */
    public function process(ValidationBuilder $builder);

}