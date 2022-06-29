<?php

namespace App\ORM;

use App\Core\BaseORM;

//note
class RencanaAngsuran extends BaseORM
{

    protected $table = 'rencana_angsuran'; //harus sama dengan nama tabel di database

    public static function latestID()
    {
        $latest = self::orderByDesc('id')->find();
        return ($latest) ? $latest->id + 1 : 1;
    }

    public static function list($pinjaman_id)
    {
        $list = self::where('pinjaman_id', $pinjaman_id)->orderByDesc('id')->get();
        return $list;
    }

    public static function getStatusLunasLabel($status)
    {

        switch ($status) {
            case 1:
                $label = "<span class='badge bg-success shadow-sm text-grey'>Lunas</span>";
                break;

            case '0':
                $label = "<span class='badge bg-warning text-muted'>Blm Lunas</span>";
                break;
        }

        return $label;
    }
}
