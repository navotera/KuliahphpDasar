<?php

namespace App\Core;

class NumberFormat
{

    // format_rupiah(1000000) hasil adalah Rp. 10.000.000
    public static function IDR($angka)
    {
        $hasil_rupiah = "Rp. " . self::money($angka);
        return $hasil_rupiah;
    }


    public static  function money($angka)
    {
        $nilai = number_format($angka, 0, ',', '.');
        return $nilai;
    }

    public static function DB($angka)
    {
        return str_replace(".", "", $angka);
    }
}
