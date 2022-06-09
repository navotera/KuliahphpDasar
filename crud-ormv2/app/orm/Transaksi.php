<?php

namespace App\ORM;

use App\Core\BaseORM;


//note
class Transaksi extends BaseORM
{
    protected $table = 'transaksi'; //harus sama dengan nama tabel di database


    public static function _jumlah($jenis_id)
    {
        return self::where('jenis_id', $jenis_id)->sum('jumlah');
    }
}
