<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Support\Str;

class Helper
{
    public static function shout(string $string)
    {
        return strtoupper($string);
    }

    function startsWithAny($string, array $prefixes)
    {
        foreach ($prefixes as $prefix) {
            if (Str::startsWith($string, $prefix)) {
                return true;
            }
        }
        return false;
    }
}
