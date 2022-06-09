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
        <h3>Form Simpanan Anggota</h3>
        <small class="text-muted">Isikan update simpanan anggota</small>
    </div>

</div>

<div class="row align-items-center mt-1">

    <form action="<?= site_url(); ?>simpanan/save" method="POST">

        <div class="mb-3 mt-4">
            <label for="nama">Nama Anggota</label>
            <input type="text" name="nama" class="form-control" readonly placeholder="Masukkan nama" value="<?= $anggota->nama; ?>">
        </div>
        <div class="mb-3">
            <label for="alamat">Kode Anggota</label>
            <input type="text" name="anggota_id" class="form-control" readonly placeholder="Alamat" value="<?= $anggota->id; ?>">
        </div>

        <div class="mb-3">
            <label for="Tanggal">Tanggal</label>
            <input type="text" name="tanggal" class="form-control datepicker" placeholder="Tanggal simpanan" value="<?= Date::today(); ?>">
        </div>

        <div class="mb-3">
            <label for="jumlah">Jumlah</label>
            <input type="text" name="jumlah" class="form-control money" placeholder="Jumlah" value="">
        </div>

        <input type="hidden" name="transaksi_id" value="<?= ($edit_mode) ? $transaksi->id : ''; ?>" />

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>