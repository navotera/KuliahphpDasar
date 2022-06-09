<?php

namespace App\ORM;

use App\Core\BaseORM;

//note
class Pinjaman extends BaseORM
{
    protected $table =  'pinjaman'; //harus sama dengan nama tabel di database

    public static function latestID()
    {
        $latest = self::latest('id')->first();
        return ($latest) ? $latest->id + 1 : 1;
    }

    public static function list($anggota_id)
    {
        $list = self::where('anggota_id', $anggota_id)->latest('id')->get();
        return $list;
    }
}
