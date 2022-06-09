<?php

namespace App\ORM;

require_once(dirname(__DIR__, 2) . '/config/database.php');

use Illuminate\Database\Eloquent\Model;


class TipeAnggota extends Model
{
    protected $table = 'tipe_anggota'; //harus sama dengan nama tabel di database

    public static function getNama($id)
    {
        $tipe = self::find($id);
        return ($tipe) ? $tipe->nama : '<span class="text-muted">Belum diisi</span>';
    }
}
