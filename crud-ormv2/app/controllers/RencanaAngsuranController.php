<?php

namespace App\Controllers;

use App\ORM\RencanaAngsuran;
use App\ORM\Angsuran;
use App\ORM\Pinjaman;
use App\Core\GET;

use App\Core\NumberFormat;

class RencanaAngsuranController
{

    function index()
    {
        echo 'afafa';
    }


    public static function show_tabel_by_anggota($anggota_id)
    {
        $data['list_pinjaman'] = Pinjaman::list($anggota_id);

        view('rencana_angsuran/list_by_anggota', $data);
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
        $angsuran->tanggal = $today;
        $angsuran->rencana_angsuran_id = $rencana_angsuran_id;
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


    function batal()
    {
        $rencana_angsuran_id = GET::get('rencana_angsuran_id');

        $rencana_angsuran = RencanaAngsuran::find($rencana_angsuran_id);
        $rencana_angsuran->status_lunas = 0;
        $rencana_angsuran->save();

        //hapus angsuran berdasarkan rencana angsuran 
        $angsuran = Angsuran::where('rencana_angsuran_id', $rencana_angsuran_id)->delete();

        redirect(site_url() . 'anggota/detail?id=' . $rencana_angsuran->anggota_id);
    }


    function get_info_pinjaman_ajax()
    {
        $pinjaman_id = GET::get('pinjaman_id');

        $pinjaman = Pinjaman::find($pinjaman_id);
        $total_angsuran = Angsuran::where('pinjaman_id', $pinjaman_id)->sum('jumlah');

        //kembalikan sebagai format json 
        header('Content-type:application/json');

        //proses menambahkan data baru dari hasil query
        $result =  json_encode($pinjaman);
        $result = json_decode($result);

        //edit nilai default dari jumlah dengan menambahkan format uang dan tambahkan pada data json sisa pinjaman
        $result->jumlah = NumberFormat::money($pinjaman->jumlah);
        $result->sisa = NumberFormat::money($pinjaman->jumlah - $total_angsuran);

        echo json_encode($result);
    }
}
