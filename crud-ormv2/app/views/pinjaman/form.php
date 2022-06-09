<?php

use App\Core\Date;


if (!$anggota) {
    echo '<script>alert("Anggota tidak ditemukan");</script>';
    $redirect = base_url() . '?page=anggota/list';
    redirect($redirect);
}


?>

<div class="row  mt-4">
    <div class="col-6">
        <h3>Form Pengajuan Pinjaman</h3>
        <small class="text-muted">Isikan Update Pinjaman anggota</small>
    </div>

</div>

<div class="row align-items-center mt-1">

    <form action="<?= base_url(); ?>?page=pinjaman/save" method="POST">


        <div class="row mt-4">
            <div class="col-8 mb-3">
                <label for="nama">Nama Anggota</label>
                <input type="text" name="nama" class="form-control" readonly placeholder="Masukkan nama" value="<?= $anggota->nama; ?>">
            </div>
            <div class="col-4 mb-3">
                <label for="alamat">Kode Anggota</label>
                <input type="text" name="anggota_id" class="form-control" readonly placeholder="kode" value="<?= $anggota->id; ?>">
            </div>
        </div>

        <div class="row">
            <div class="col-3 mb-3">
                <label for="Tanggal">Kode Pinjaman</label>
                <input type="text" name="kode" class="form-control " readonly placeholder="Kode" value="<?= ($edit_mode) ? $pinjaman->kode : $kode_pinjaman; ?>">
            </div>

            <div class="col-3 mb-3">
                <label for="Tanggal">Tanggal Mulai</label>
                <input type="text" name="tanggal" class="form-control datepicker" required placeholder="Tanggal mulai" value="<?= Date::today(); ?>">
            </div>

            <div class="col-3 mb-3">
                <label for="Tanggal">Tanggal Berakhir</label>
                <input type="text" name="tanggal_jatuh_tempo" class="form-control datepicker" required placeholder="Tanggal Berakhirnya" value="">
            </div>

            <div class="col-3 mb-3">
                <label for="Tanggal">Tanggal Jatuh Tempo tiap bulan</label>
                <input type="text" name="tanggal_jatuh_tempo_angsuran_perbulan" required class="form-control" placeholder="Isi tanggal dari 1 s/d 30">
            </div>
        </div>

        <div class="mb-3">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" class="form-control money" required placeholder="Jumlah" value="">
        </div>

        <div class="mb-3">
            <label for="jumlah">Jumlah Kali Angsuran</label>
            <input type="text" name="jumlah_kali_angsuran" class="form-control" required placeholder="Berapa kali mengangsur?" value="">
        </div>

        <div class="mb-3">
            <label for="jumlah">Catatan</label>
            <input type="text" name="catatan" class="form-control" placeholder="Isi catatan" value="">
        </div>





        <input type="hidden" name="pinjaman_id" value="<?= ($edit_mode) ? $pinjaman->id : ''; ?>" />

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>