<?php

namespace App\Core;

class POST
{

    public static function get($name)
    {
        return ($_POST[$name]) ?? false;
    }
}
