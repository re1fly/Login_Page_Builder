<?php

namespace App\Http\Controllers;

use App\Constants\FormType;
use App\Constants\ValidationAttribute;
use App\Constants\ValidationType;
use App\Helpers\Request\Validation;
use App\Helpers\Response\Constants\Success;
use App\Http\Requests\FormRequest;
use App\Http\Requests\TemplateRequest;
use App\Models\HotspotLoginForm;
use App\Models\HotspotLoginPage;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    private $tmpDir;
    private $htmlPath;
    private $jsonPath;
    private $formPath;


    public function __construct()
    {
        $this->tmpDir = storage_path('tmp');
        $this->htmlPath = $this->tmpDir . '/template_html.html';
        $this->jsonPath = $this->tmpDir . '/template_json.json';
        $this->formPath = $this->tmpDir . '/form_json.json';
    }

    public function testing(Request $request)
    {
        $loginPage = HotspotLoginForm::first();

        return $loginPage;
    }

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

    private function validation(Request $request)
    {
        Validation::request($request->all(), ['testing' => 'email']);

        Validation::request($request, ['testing2' => 'required']);
    }

    private function testingSaveLoginPage(string $serviceLocationId)
    {
        $loginPage = HotspotLoginPage::updateOrCreate(['serviceLocationId' => $serviceLocationId], [
            'company' => 'Testing'
        ]);

        HotspotLoginForm::updateOrCreate(['loginPageId' => $loginPage->id], [
            'forms' => $this->setFormAttributes()
        ]);
    }

    private function setFormAttributes()
    {
        return [
            [
                'name' => 'name',
                'type' => FormType::getIDName(FormType::TEXT_ID),
                'icon' => null,
                'validations' => [
                    'type' => ValidationType::getIDName(ValidationType::STRING_ID),
                    'required' => true,
                    'date_format' => null,
                    'nullable' => false
                ]
            ],
            [
                'name' => 'phone_number',
                'type' => FormType::getIDName(FormType::NUMBER_ID),
                'icon' => null,
                'validations' => [
                    'type' => ValidationType::getIDName(ValidationType::INTEGER_ID),
                    'required' => true,
                    'date_format' => null,
                    'nullable' => false
                ]
            ],
            [
                'name' => 'email',
                'type' => FormType::getIDName(FormType::TEXT_ID),
                'icon' => null,
                'validations' => [
                    'type' => ValidationType::getIDName(ValidationType::EMAIL_ID),
                    'required' => true,
                    'date_format' => null,
                    'nullable' => false
                ]
            ],
            [
                'name' => 'birth_date',
                'type' => FormType::getIDName(FormType::DATE_ID),
                'icon' => null,
                'validations' => [
                    'type' => ValidationType::getIDName(ValidationType::OTHER_ID),
                    'required' => true,
                    'date_format' => 'd/m/Y',
                    'nullable' => false
                ]
            ],
            [
                'name' => 'gender',
                'type' => FormType::getIDName(FormType::RADIO_BUTTON_ID),
                'icon' => null,
                'validations' => [
                    'type' => ValidationType::getIDName(ValidationType::INTEGER_ID),
                    'required' => true,
                    'date_format' => null,
                    'nullable' => false
                ]
            ],
            [
                'name' => 'married',
                'type' => FormType::getIDName(FormType::RADIO_BUTTON_ID),
                'icon' => null,
                'validations' => [
                    'type' => ValidationType::getIDName(ValidationType::BOOLEAN_ID),
                    'required' => false,
                    'date_format' => null,
                    'nullable' => true
                ]
            ],
        ];
    }

}
