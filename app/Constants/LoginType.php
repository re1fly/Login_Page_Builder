<?php

namespace App\Constants;

class LoginType
{
    const GOOGLE_ID = 1;
    const GOOGLE = 'Google';
    const TWITTER_ID = 2;
    const TWITTER = 'Twitter';
    const FACEBOOK_ID = 3;
    const FACEBOOK = 'Facebook';
    const GITHUB_ID = 4;
    const GITHUB = 'Github';
    const FORM_ID = 5;
    const FORM = 'Form';
    const UNKNOWN_ID = 0;
    const UNKNOWN = 'Unknown';

    public static function getAll()
    {
        return [
            [self::GOOGLE_ID, self::GOOGLE],
            [self::TWITTER_ID, self::TWITTER],
            [self::FACEBOOK_ID, self::FACEBOOK],
            [self::GITHUB_ID, self::GITHUB],
            [self::FORM_ID, self::FORM],
        ];
    }

}
