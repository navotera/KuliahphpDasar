<?php

use App\Core\Date;


?>

<div class="row  mt-4">
    <div class="col-6">
        <h2>Form Angsuran</h2>
        <small class="text-muted">Tambahkan angsuran anggota</small>
    </div>

</div>

<div class="row align-items-center mt-4">

    <form action="<?= site_url(); ?>angsuran/save" method="POST">

        <input type="hidden" name="anggota_id" value="<?= $anggota->id; ?>">


        <div class=" mb-3">
            <label for="email">Nama Anggota</label>
            <input type="text" name="nama_anggota" class="form-control" value="<?= $anggota->nama; ?>">

        </div>

        <div class=" row mt-3">
            <div class="col-6">
                <div class="mb-3">
                    <label for="email">Tanggal</label>
                    <input type="text" name="tanggal" class="form-control datepicker" value="<?= date('d-m-Y'); ?>">
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="email">Jumlah Angsuran</label>
                    <input type="text" name="jumlah" class="form-control money" value="">
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>