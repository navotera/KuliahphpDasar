<?php

namespace App\ORM;

use App\Core\BaseORM;

class TipeAnggota extends BaseORM
{
    protected $table = 'tipe_anggota'; //harus sama dengan nama tabel di database

    public static function getNama($id)
    {
        $tipe = self::find($id);
        return ($tipe) ? $tipe->nama : '<span class="text-muted">Belum diisi</span>';
    }
}
