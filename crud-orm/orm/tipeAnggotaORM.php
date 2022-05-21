<?php

require_once('config.php');

//note
class tipeAnggotaORM extends Model
{
    public static $_table = 'tipe_anggota'; //harus sama dengan nama tabel di database

    public static function getNama($id)
    {
        $tipe = self::findOne($id);
        return ($tipe) ? $tipe->nama : '<span class="text-muted">Belum diisi</span>';
    }
}
