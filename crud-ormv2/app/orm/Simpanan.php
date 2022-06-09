<?php

namespace App\ORM;

use App\ORM\Transaksi;

//note
class Simpanan extends Transaksi
{

    public static function latestID()
    {
        $latest = self::where('jenis_id', SIMPANAN)->latest('id')->first();
        return ($latest) ? $latest->id + 1 : 1;
    }

    public static function list($anggota_id)
    {
        $list = self::where('jenis_id', SIMPANAN)->where('anggota_id', $anggota_id)->orderByDesc('id')->get();
        return $list;
    }

    public static function jumlah($anggota_id)
    {
        return  self::where('jenis_id', SIMPANAN)->where('anggota_id', $anggota_id)->sum('jumlah');
    }
}
