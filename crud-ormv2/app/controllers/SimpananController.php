<?php

namespace App\Controllers;

use App\Core\GET;
use App\Core\Date;
use App\Core\NumberFormat;
use App\Core\Session;

use App\ORM\Anggota;
use App\ORM\TipeAnggota;
use App\ORM\Simpanan;
use App\ORM\Transaksi;

class SimpananController
{

    public function index()
    {

        echo 'index';
    }



    public function form()
    {

        // $anggota_id = $_GET['anggota_id'];
        $anggota_id = GET::get('anggota_id');

        $data['anggota'] = Anggota::find($anggota_id);
        $data['tipe_list'] = TipeAnggota::all();
        $data['edit_mode'] = GET::get('transaksi_id');

        if ($data['edit_mode']) {
            $data['transaksi'] = Transaksi::find(GET::get('transaksi_id'));
        }


        $data['kode_simpanan'] = Simpanan::latestID();

        render('simpanan/form', $data);
    }

    public function save()
    {

        $post = (object) $_POST;

        //default :: metode adalah insert atau menyimpan data baru
        $simpanan = new Simpanan;

        //mode update
        if (isset($post->transaksi) && $post->transaksi != 0) {
            $simpanan = Simpanan::find($post->transaksi);
        }

        $simpanan->anggota_id = $post->anggota_id;
        $simpanan->jenis_id = SIMPANAN;
        $simpanan->jumlah = NumberFormat::DB($post->jumlah);
        $simpanan->tanggal = Date::formatDB($post->tanggal);
        $simpanan->kode = $post->kode_simpanan;
        $simpanan->save();


        Session::flash_message('Simpan Berhasil');

        redirect(site_url() . 'anggota/detail?id=' . $post->anggota_id);
    }
}
