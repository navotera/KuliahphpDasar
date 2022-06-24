<?php

namespace App\ORM;

use App\Core\BaseORM;

class Angsuran extends BaseORM
{
    protected $table = 'angsuran';

    public static function list($anggota_id)
    {
        return self::where('anggota_id', $anggota_id)->get();
    }
}
