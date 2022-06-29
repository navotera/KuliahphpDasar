<?php

namespace App\Controllers;

use App\ORM\RencanaAngsuran;
use App\ORM\Angsuran;
use App\ORM\Pinjaman;
use App\Core\GET;

class RencanaAngsuranController
{

    function index()
    {
        echo 'afafa';
    }

    function list_rencana_angsuran()
    {
        $pinjaman_id = GET::get('pinjaman_id');
        $data['list'] = RencanaAngsuran::where('pinjaman_id', $pinjaman_id)->get();

        view('rencana_angsuran/list', $data);
    }

    function dibayarkan()
    {
        $rencana_angsuran_id = GET::get('id');

        $today = date('Y-m-d');

        $rencana_angsuran = RencanaAngsuran::find($rencana_angsuran_id);

        //get frequensi angsuran berdasarkan pinjaman ID
        $kali_angsuran = Angsuran::where('pinjaman_id', $rencana_angsuran->pinjaman_id)->count();




        $rencana_angsuran->status_lunas = 1;
        $rencana_angsuran->status_jatuh_tempo = ($today > $rencana_angsuran->tanggal) ? 1 : 0;
        $rencana_angsuran->tanggal_dibayarkan = $today;
        $rencana_angsuran->save();

        $angsuran = new Angsuran;
        $angsuran->tanggal = date('Y-m-d');
        $angsuran->jumlah = $rencana_angsuran->jumlah;
        $angsuran->pinjaman_id = $rencana_angsuran->pinjaman_id;
        $angsuran->time_log = time();
        $angsuran->status_lunas = 1;
        $angsuran->status_jatuh_tempo = $rencana_angsuran->status_jatuh_tempo;
        $angsuran->anggota_id = $rencana_angsuran->anggota_id;
        $angsuran->angsuran_ke = $kali_angsuran + 1;
        $angsuran->save();



        //check apakah sudah lunas 
        $total_angsuran = Angsuran::where('pinjaman_id', $angsuran->pinjaman_id)->sum('jumlah');
        $pinjaman = Pinjaman::find($angsuran->pinjaman_id);

        if ($total_angsuran >= $pinjaman) {
            $pinjaman->status_lunas = 1;
            $pinjaman->save();
        }





        redirect(site_url() . 'anggota/detail?id=' . $rencana_angsuran->anggota_id);
    }
}
