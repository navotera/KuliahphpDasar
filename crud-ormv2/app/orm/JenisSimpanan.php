<?php

namespace App\ORM;

require_once(dirname(__DIR__, 2) . '/config/database.php');

//note
class JenisSimpanan extends \Model
{
    public static $_table = 'jenis_simpanan'; //harus sama dengan nama tabel di database

}
