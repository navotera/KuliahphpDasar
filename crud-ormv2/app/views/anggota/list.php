<?php

use App\ORM\TipeAnggota;
?>


<div class="row  mt-4">
    <div class="col-10">
        <h2>List Anggota</h2>
        <sub>Daftar anggota koperasi</sub>
    </div>
    <div class="col-2">
        <a href="<?= site_url(); ?>anggota/form" class="btn btn-info shadow-sm text-white float-end  "><i class="bi bi-plus"></i> Tambah</a>
    </div>

</div>

<div class="row align-items-center mt-4 px-3">
    <table class="table table-bordered">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Alamat</td>
            <td>Telp</td>
            <td>Tipe Anggota</td>
            <td>Tanggal Daftar</td>
        </tr>

        <?php foreach ($list as $key => $anggota) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><a href="<?= site_url(); ?>anggota/detail?id=<?= $anggota->id; ?>"><?= $anggota->nama; ?></a></td>
                <td><?= $anggota->email; ?></td>
                <td><?= $anggota->alamat; ?></td>
                <td><?= $anggota->telp; ?></td>
                <td><?= TipeAnggota::getNama($anggota->tipe_id); ?></td>
                <td><?= App\Core\Date::formatID($anggota->tanggal); ?></td>

            </tr>
        <?php endforeach; ?>
    </table>
</div>