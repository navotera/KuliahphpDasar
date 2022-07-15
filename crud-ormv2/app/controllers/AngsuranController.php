<?php


namespace App\Controllers;

use App\Core\Date;
use App\Core\NumberFormat;

use App\ORM\Angsuran;
use App\ORM\Anggota;
use App\ORM\RencanaAngsuran;

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


    //bayar dengan jumlah berbeda
    function save()
    {
        $post = (object) $_POST;

        $today = date('Y-m-d');
        $bulan = date('m');

        $jumlah_pembayaran = NumberFormat::db($post->jumlah);


        $kali_angsuran = Angsuran::where('pinjaman_id', $post->pinjaman_id)->count();

        //untuk mengetahui angsuran jatuh tempo maka kita akan menggunakan acuan rencana angsuran
        $rencana_angsuran = RencanaAngsuran::find($post->rencana_angsuran_id);

        $isJatuhTempo =  ($today > $rencana_angsuran->tanggal) ? 1 : 0;

        $angsuran = new Angsuran;
        $angsuran->rencana_angsuran_id = $rencana_angsuran->id;
        $angsuran->tanggal = $today;
        $angsuran->jumlah = NumberFormat::db($post->jumlah);
        $angsuran->pinjaman_id = $post->pinjaman_id;
        $angsuran->time_log = time();
        $angsuran->status_lunas = 1;
        $angsuran->status_jatuh_tempo = $isJatuhTempo;
        $angsuran->anggota_id = $post->anggota_id;
        $angsuran->angsuran_ke = $kali_angsuran + 1;
        $angsuran->save();


        $status_lunas = 1;
        $jumlah_harus_dibayar = $jumlah_pembayaran;
        //update rencana angsuran 
        if ($jumlah_pembayaran < $rencana_angsuran->jumlah) {
            $status_lunas = 0;
            $jumlah_harus_dibayar = $rencana_angsuran->jumlah - $jumlah_pembayaran;
        }


        $rencana_angsuran->jumlah = $jumlah_harus_dibayar;
        $rencana_angsuran->status_lunas = $status_lunas;
        $rencana_angsuran->save();






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
