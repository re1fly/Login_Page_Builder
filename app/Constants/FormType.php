<?php

namespace App\Constants;

class FormType
{
    const TEXT_ID = 1;
    const TEXT = 'Text';
    const NUMBER_ID = 2;
    const NUMBER = 'Number';
    const RADIO_BUTTON_ID = 3;
    const RADIO_BUTTON = 'Radio Button';
    const CHECKBOX_ID = 4;
    const CHECKBOX = 'Checkbox';
    const SELECT_OPTION_ID = 5;
    const SELECT_OPTION = 'Select Option';
    const DATE_ID = 6;
    const DATE = 'Date';
    const UNKNOWN_ID = 0;
    const UNKNOWN = 'Unknown';

    public static function getName(int $typeId)
    {
        switch ($typeId) {
            case self::TEXT_ID:
                return self::TEXT;
            case self::NUMBER_ID:
                return self::NUMBER;
            case self::RADIO_BUTTON_ID:
                return self::RADIO_BUTTON;
            case self::CHECKBOX_ID:
                return self::CHECKBOX;
            case self::SELECT_OPTION_ID:
                return self::SELECT_OPTION;
            case self::DATE_ID:
                return self::DATE;
            default:
                return self::UNKNOWN;
        }
    }

    public static function getIDName($typeId)
    {
        switch ($typeId) {
            case self::TEXT_ID:
                return ['id' => self::TEXT_ID, 'name' => self::TEXT];
            case self::NUMBER_ID:
                return ['id' => self::NUMBER_ID, 'name' => self::NUMBER];
            case self::RADIO_BUTTON_ID:
                return ['id' => self::RADIO_BUTTON_ID, 'name' => self::RADIO_BUTTON];
            case self::CHECKBOX_ID:
                return ['id' => self::CHECKBOX_ID, 'name' => self::CHECKBOX];
            case self::SELECT_OPTION_ID:
                return ['id' => self::SELECT_OPTION_ID, 'name' => self::SELECT_OPTION];
            case self::DATE_ID:
                return ['id' => self::DATE_ID, 'name' => self::DATE];
            default:
                return ['id' => self::UNKNOWN_ID, 'name' => self::UNKNOWN];
        }
    }

    public function all()
    {
        return [
            ['id' => self::TEXT_ID, 'name' => self::TEXT],
            ['id' => self::NUMBER_ID, 'name' => self::NUMBER],
            ['id' => self::RADIO_BUTTON_ID, 'name' => self::RADIO_BUTTON],
            ['id' => self::CHECKBOX_ID, 'name' => self::CHECKBOX],
            ['id' => self::SELECT_OPTION_ID, 'name' => self::SELECT_OPTION],
            ['id' => self::DATE_ID, 'name' => self::DATE]
        ];
    }

}