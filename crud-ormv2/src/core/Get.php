<?php

namespace App\Core;

class GET
{

    public static function get($name)
    {
        return ($_GET[$name]) ?? false;
    }
}
