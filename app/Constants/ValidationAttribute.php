<?php

namespace App\Constants;

class ValidationAttribute
{
    const TYPE = 'type';
    const REQUIRED = 'required';
    const DATE_FORMAT = 'date_format';
    const NULLABLE = 'nullable';

    public static function all()
    {
        return [
            ['name' => self::TYPE, 'values' => ValidationType::all()],
            ['name' => self::REQUIRED, 'values' => [true, false]],
            ['name' => self::DATE_FORMAT, 'values' => [null, 'd/m/Y', 'd-m-Y', 'Y-m-d']],
            ['name' => self::NULLABLE, 'values' => [true, false]],
        ];
    }

}