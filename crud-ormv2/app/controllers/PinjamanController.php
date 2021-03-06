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
use App\ORM\User;

class PinjamanController
{

    public function form()
    {
        //check if user is logged in, if not, show the login page
        User::isLoggedIn();

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
        //check if user is logged in, if not, show the login page
        User::isLoggedIn();

        //check if duplicate
        $isExist = Pinjaman::where('kode', POST::get('kode'))->first();

        if ($isExist !== null) {
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

        redirect(site_url() . 'anggota/detail?id=' . POST::get('anggota_id'));
    }


    public function contoh_for()
    {

        for ($i = 0; $i < 20; $i++) {
            echo $i;
            echo '<br>';
        }
    }


    protected function tambahRencanaAngsuran($pinjaman_id)
    {
        //check if user is logged in, if not, show the login page
        User::isLoggedIn();

        $pinjaman = Pinjaman::find($pinjaman_id);

        $jumlah_kali_angsuran = $pinjaman->jumlah_kali_angsuran;

        for ($i = 0; $i < $jumlah_kali_angsuran; $i++) {

            $rencana_angsuran = new RencanaAngsuran;

            $rencana_angsuran->pinjaman_id = $pinjaman_id;
            $rencana_angsuran->jumlah = $pinjaman->angsuran;
            $rencana_angsuran->tanggal = Date::addMonths($pinjaman->tanggal, $i, $pinjaman->tanggal_jatuh_tempo_angsuran_perbulan);
            $rencana_angsuran->time_log = time();
            $rencana_angsuran->status_aktif = 1;
            $rencana_angsuran->angsuran_ke = $i + 1;
            $rencana_angsuran->anggota_id = $pinjaman->anggota_id;
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
