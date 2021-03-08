<?php

namespace App\Helpers;

use App\Constants\FormType;
use App\Constants\ValidationType;
use App\Exceptions\ProcessFailedException;
use App\Helpers\Response\Constants\Error;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LoginFormDecoder
{
    /**
     * @param array $forms
     *
     * @return array
     */
    public static function decode(array $forms): array
    {
        try {

            $attributes = [];
            foreach ($forms as $form) {

                $values = [];
                if (isset($form['values'])) {
                    $values = ['values' => self::setValues($form['values'])];
                }

                $attributes[] = [
                        'name' => Str::snake($form['name']),
                        'display' => Str::title(str_replace("_", " ", $form['name'])),
                        'type' => FormType::getIDName($form['typeId']),
                        'icon' => $form['icon'],
                        'validations' => self::setValidation($form['validations'])
                    ] + $values;

            }

            return $attributes;

        } catch (\Exception $exception) {
            Log::error($exception);
            throw new ProcessFailedException(Error::LOGIN_PAGE['UNABLE_TO_DECODE_FORM'], $exception->getMessage());
        }
    }


    /*
     |--------------------------------------------------------------------------
     |  Private Function
     |--------------------------------------------------------------------------
     */

    /**
     * @param array $validations
     *
     * @return array
     */
    private static function setValidation(array $validations): array
    {
        $validations['type'] = ValidationType::getIDName($validations['typeId']);

        unset($validations['typeId']);
        return $validations;
    }

    /**
     * @param array $values
     *
     * @return array
     */
    private static function setValues(array $values): array
    {
        $attributes = [];
        foreach ($values as $key => $value) {

            $attributes[] = [
                'id' => ($key + 1),
                'name' => Str::snake($value),
                'display' => Str::title(str_replace("_", " ", $value))
            ];

        }

        return $attributes;
    }

}
