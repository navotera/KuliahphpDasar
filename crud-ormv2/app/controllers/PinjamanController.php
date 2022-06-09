<?php

namespace App\Controllers;

use App\Core\GET;
use App\Core\Date;
use App\Core\NumberFormat;
use App\Core\POST;

use App\ORM\Anggota;
use App\ORM\TipeAnggota;
use App\ORM\Pinjaman;
use App\ORM\RencanaAngsuran;

class PinjamanController
{

    public function form()
    {
        $anggota_id = GET::get('anggota_id');

        $data['anggota'] = Anggota::find($anggota_id);
        $data['tipe_list'] = TipeAnggota::get();
        $data['kode_pinjaman'] = 'P' . Pinjaman::latestID();
        $data['edit_mode'] = GET::get('pinjaman_id');

        if ($data['edit_mode']) {
            $data['pinjaman'] = Pinjaman::find(GET::get('transaksi_id'));
        }


        // $data['kode_simpanan'] = simpananORM::latestID();



        render('pinjaman/form', $data);
    }


    function save()
    {
        //check if duplicate
        $isExist = Pinjaman::where('kode', POST::get('kode'))->find();


        if ($isExist) {
            echo 'duplicated';
            return;
        }


        $total_angsuran =  NumberFormat::DB(POST::get('jumlah'));
        $jumlah_kali_angsuran = POST::get('jumlah_kali_angsuran');

        $perhitungan_angsuran = $total_angsuran / $jumlah_kali_angsuran;

        $pinjaman = new Pinjaman;

        $pinjaman->kode = POST::get('kode');
        $pinjaman->tanggal = Date::formatDB(POST::get('tanggal'));
        $pinjaman->anggota_id = POST::get('anggota_id');
        $pinjaman->jumlah = $total_angsuran;
        $pinjaman->catatan = POST::get('catatan');
        $pinjaman->jumlah_kali_angsuran = $jumlah_kali_angsuran;
        $pinjaman->masa_angsuran = POST::get('masa_angsuran');
        $pinjaman->angsuran = $perhitungan_angsuran;
        $pinjaman->tanggal_jatuh_tempo =  Date::formatDB(POST::get('tanggal_jatuh_tempo'));
        $pinjaman->tanggal_jatuh_tempo_angsuran_perbulan = (int) POST::get('tanggal_jatuh_tempo_angsuran_perbulan');

        $pinjaman->added_by = 1;
        $pinjaman->timestamps = time();
        $pinjaman->save();


        // tambah angsuran disini 
        $this->tambahRencanaAngsuran($pinjaman->id);



        redirect('?page=anggota/detail&id=' . POST::get('anggota_id'));
    }


    protected function tambahRencanaAngsuran($pinjaman_id)
    {

        $pinjaman = Pinjaman::findOne($pinjaman_id);

        $total_angsuran =  $pinjaman->jumlah;
        $jumlah_kali_angsuran = $pinjaman->jumlah_kali_angsuran;

        $perhitungan_angsuran = $total_angsuran / $jumlah_kali_angsuran;

        for ($i = 0; $i < $jumlah_kali_angsuran; $i++) {

            $rencana_angsuran = RencanaAngsuran::create();

            $rencana_angsuran->pinjaman_id = $pinjaman_id;
            $rencana_angsuran->jumlah = $perhitungan_angsuran;
            $rencana_angsuran->tanggal = Date::addMonths($pinjaman->tanggal_jatuh_tempo, $i);
            $rencana_angsuran->time_log = time();
            $rencana_angsuran->status_aktif = 1;
            $rencana_angsuran->save();
        }
    }




    public function checkAngsuran($anggota_id)
    {
        /**
         * 1. cek pada tabel pinjaman, apakah tanggal sekarang sudah tanggal yang harus diangsur atau belum
         * 2. Jika ada yang yang mesti diangsur, maka tambahkan di tabel angsuran dengan status BELUM_LUNAS 
         *  
         */
    }
}
