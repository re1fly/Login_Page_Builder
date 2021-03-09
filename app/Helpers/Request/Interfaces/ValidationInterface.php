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
     * @param array|HotspotLoginForm $rules
     */
    public function setRules($rules);

    /**
     * @param ValidationBuilder $builder
     */
    public function process(ValidationBuilder $builder);

}