<?php

namespace App\Core;

require_once(dirname(__DIR__, 2) . '/config/database.php');


use Illuminate\Database\Eloquent\Model;

class BaseORM extends Model
{

    const CREATED_AT = null;
    const UPDATED_AT = null;
}
