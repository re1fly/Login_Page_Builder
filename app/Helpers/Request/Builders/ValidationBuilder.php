<?php

namespace App\Helpers\Request\Builders;

use App\Constants\ValidationAttribute;
use App\Constants\ValidationType;
use App\Exceptions\RequestException;
use App\Helpers\Request\Interfaces\ValidationInterface;
use App\Models\HotspotLoginForm;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidationBuilder implements ValidationInterface
{
    /**
     * @var HotspotLoginForm
     */
    public $loginForm;

    /**
     * @var Request|array
     */
    public $request;

    /**
     * @var array
     */
    public $rules;

    /**
     * @var bool
     */
    public $errorRedirectToBack;


    /**
     * @param Request|array $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * @param HotspotLoginForm $loginForm
     */
    public function setLoginForm(HotspotLoginForm $loginForm)
    {
        $this->loginForm = $loginForm;
    }

    /**
     * @param array $rules
     */
    public function setRules(array $rules)
    {
        $this->rules = $rules;
    }

    /**
     * @param bool $errorRedirectToBack
     */
    public function setErrorRedirectToBack($errorRedirectToBack)
    {
        $this->errorRedirectToBack = $errorRedirectToBack;
    }


    /**
     * @param ValidationBuilder $builder
     *
     * @throws RequestException
     */
    public function process(ValidationBuilder $builder)
    {
        if ($builder->loginForm) {
            $builder->rules = $this->setRulesFromLoginForm($builder->loginForm);
        }

        $request = $builder->request;
        if ($request instanceof Request) {
            $request = $request->all();
        }

        $validator = Validator::make($request, $builder->rules);
        if ($validator->fails()) {
            throw new RequestException($validator);
        }
    }


    /*
     |--------------------------------------------------------------------------
     |  Private Functions
     |--------------------------------------------------------------------------
     */

    /**
     * @param HotspotLoginForm $loginForm
     *
     * @return array
     */
    private function setRulesFromLoginForm(HotspotLoginForm $loginForm): array
    {
        $forms = $loginForm->forms;
        if (!$forms || !is_array($forms)) {
            return [];
        }

        $rules = [];
        foreach ($forms as $form) {

            if (isset($form['validations'])) {

                $validations = $form['validations'];
                if (is_array($validations)) {

                    $validate = '';

                    if ($validations[ValidationAttribute::REQUIRED]) {
                        $validate .= ValidationAttribute::REQUIRED;
                    }

                    if ($validations[ValidationAttribute::TYPE]['id'] != ValidationType::OTHER_ID) {
                        $validate .= ($validate ? '|' : '') .
                            strtolower(ValidationType::getName($validations[ValidationAttribute::TYPE]['id']));
                    }

                    if ($validations[ValidationAttribute::DATE_FORMAT]) {
                        $validate .= ($validate ? '|' : '') . ValidationAttribute::DATE_FORMAT . ':"'
                            . $validations[ValidationAttribute::DATE_FORMAT] . '"';
                    }

                    if ($validations[ValidationAttribute::NULLABLE]) {
                        $validate .= ($validate ? '|' : '') . ValidationAttribute::NULLABLE;
                    }

                    $rules[$form['name']] = $validate;

                }

            }

        }

        return $rules;
    }

}