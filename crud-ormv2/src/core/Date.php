<?php

namespace App\Core;

class Date
{


    public static function _checkNull($date)
    {
        return (is_null($date)) ? false : $date;
    }

    public static function today()
    {
        return date('d-m-Y');
    }

    public static function yesterday()
    {
        return date('Y-m-d', strtotime('-1 days'));
    }

    //return tanggal indonesia 20 Januari 2022
    public static  function formatID($tanggal)
    {
        if (!self::_checkNull($tanggal))
            return '<span class="text-muted"> - </span>';

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }



    public static function time($date = false)
    {
        return ($date) ? strtotime($date) :  time();
    }


    public static function inputHTML($date = false)
    {
        return ($date) ? date('d-m-Y', strtotime($date)) :  date('d-m-Y');
    }



    public static function formatDB($date = false)
    {

        return ($date) ? date('Y-m-d', strtotime($date)) :  date('Y-m-d');
    }



    public static function addMonths($date, $months, $date_exact = false)
    {

        $date = new \DateTime($date);
        $init = clone $date;
        $modifier = $months . ' months';
        $back_modifier = -$months . ' months';

        $date->modify($modifier);
        $back_to_init = clone $date;
        $back_to_init->modify($back_modifier);

        while ($init->format('m') != $back_to_init->format('m')) {
            $date->modify('-1 day');
            $back_to_init = clone $date;
            $back_to_init->modify($back_modifier);
        }

        $returned_date = $date->format('Y-m-d');

        if ($date_exact) {
            $date->setDate($date->format('Y'), $date->format('m'), $date_exact);
            $returned_date = $date->format('Y-m-d');
        }

        return $returned_date;
    }
}
