<?php


namespace App\Controllers;

use App\Core\Date;
use App\Core\Session;

use App\ORM\Anggota;
use App\ORM\Simpanan;
use App\ORM\Pinjaman;
use App\ORM\TipeAnggota;
use App\ORM\Angsuran;



class AnggotaController
{


    public function index()
    {

        //include_once dirname(__DIR__, 1) . '../views/anggota/index.php';
        self::list();
    }

    public function list()
    {

        $data['list'] = Anggota::get();

        render('anggota/list', $data);
    }


    public function form()
    {

        $data['title'] = 'Form pendaftaran';

        render('anggota/form', $data);
    }



    public function detail()
    {

        $anggota_id = $_GET['id'];

        $anggota = Anggota::find($anggota_id);

        if (!$anggota) {
            die('Anggota tidak ditemukan');
        }


        $data['title'] = $anggota->nama;

        $data['anggota'] = Anggota::find($anggota_id);

        $data['list_simpanan'] = Simpanan::list($anggota_id);
        $data['list_pinjaman'] = Pinjaman::list($anggota_id);
        $data['list_angsuran'] = Angsuran::list($anggota_id);

        $data['tipe_anggota'] = TipeAnggota::getNama($anggota->tipe_id);

        $data['jumlah_simpanan'] = Simpanan::jumlah($anggota_id);

        render('anggota/detail', $data);
    }


    public function save()
    {

        $post = (object) $_POST;

        //default :: metode adalah insert
        $anggota = new Anggota;

        //mode update
        if (isset($post->id) && $post->id != 0) {
            $anggota = Anggota::find($post->id);
        }

        $anggota->nama = $post->nama;
        $anggota->alamat = $post->alamat;
        $anggota->telp = $post->telp;
        $anggota->email = $post->email;
        $anggota->tipe_id = $post->tipe_id;
        $anggota->tanggal = Date::formatDB($post->tanggal);
        $anggota->save();

        Session::flash_message('Simpan Berhasil');
        $redirect = site_url() . 'anggota/list';
        if ($anggota->id) {
            redirect($redirect);
        }
    }

    public function delete()
    {
        //cek apakah ada nilai dari $_GET['id']
        if (!isset($_POST['id'])) {
            die("Error - id Tidak ada");
        }

        $id = $_POST['id'];

        $anggota = anggotaORM::findOne($id);
        $anggota->delete();

        Session::flash_message('<span class="text-danger">Hapus Berhasil</span>');
        $redirect = base_url() . '?page=anggota/list';
        redirect($redirect);
    }
}
