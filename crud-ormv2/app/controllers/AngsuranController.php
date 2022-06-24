<?php


namespace App\Controllers;

use App\Core\Date;
use App\Core\NumberFormat;

use App\ORM\Angsuran;
use App\ORM\Anggota;


class AngsuranController
{

    function index()
    {
        echo 'ini index function';
    }


    function form()
    {

        $get = (object) $_GET;

        $data['anggota'] = Anggota::find($get->anggota_id);

        render('angsuran/form', $data);
    }


    function save()
    {
        $post = (object) $_POST;

        $angsuran = new Angsuran;

        $angsuran->tanggal = Date::formatDB($post->tanggal);
        $angsuran->jumlah = NumberFormat::DB($post->jumlah);
        $angsuran->anggota_id = $post->anggota_id;
        $angsuran->save();

        redirect(site_url() . 'anggota/detail?id=' . $post->anggota_id);
    }

    function lihat()
    {
        render('angsuran/lihat');
    }

    function detail()
    {
        echo 'inilah hasil dari detail';
    }
}
