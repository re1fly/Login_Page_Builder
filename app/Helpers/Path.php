<?php

namespace App\Helpers;

class Path
{
    const TMP_PATH = 'tmp';

    const PAGE_LOGO = 'page/logo';
    const PAGE_BACKGROUND = 'page/background';


    public static function DEFAULT_PUBLIC_PATH(string $dir = null)
    {
        return storage_path('app/public') . ($dir ? "/$dir" : "");
    }


    public static function DEFAULT_PUBLIC_URL($file)
    {
        return self::DEFAULT_PUBLIC_PATH() . "/$file";
    }

}
