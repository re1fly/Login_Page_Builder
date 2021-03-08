<?php

namespace App\Constants;

class ValidationType
{
    const STRING_ID = 1;
    const STRING = 'String';
    const INTEGER_ID = 2;
    const INTEGER = 'Integer';
    const BOOLEAN_ID = 3;
    const BOOLEAN = 'Boolean';
    const EMAIL_ID = 4;
    const EMAIL = 'Email';
    const OTHER_ID = 0;
    const OTHER = 'other';

    public static function getName($typeId)
    {
        switch ($typeId) {
            case self::STRING_ID:
                return self::STRING;
            case self::INTEGER_ID:
                return self::INTEGER;
            case self::BOOLEAN_ID:
                return self::BOOLEAN;
            case self::EMAIL_ID:
                return self::EMAIL;
            default:
                return self::OTHER;
        }
    }

    public static function getIDName($typeId)
    {
        switch ($typeId) {
            case self::STRING_ID:
                return ['id' => self::STRING_ID, 'name' => self::STRING];
            case self::INTEGER_ID:
                return ['id' => self::INTEGER_ID, 'name' => self::INTEGER];
            case self::BOOLEAN_ID:
                return ['id' => self::BOOLEAN_ID, 'name' => self::BOOLEAN];
            case self::EMAIL_ID:
                return ['id' => self::EMAIL_ID, 'name' => self::EMAIL];
            default:
                return ['id' => self::OTHER_ID, 'name' => self::OTHER];
        }
    }

    public static function all()
    {
        return [
            ['id' => self::STRING_ID, 'name' => self::STRING],
            ['id' => self::INTEGER_ID, 'name' => self::INTEGER],
            ['id' => self::BOOLEAN_ID, 'name' => self::BOOLEAN],
            ['id' => self::EMAIL_ID, 'name' => self::EMAIL],
            ['id' => self::OTHER_ID, 'name' => self::OTHER],
        ];
    }

}