<?php

$list = anggotaORM::findMany();

?>


<div class="row  mt-4">
    <div class="col-10">
        <h1>List Anggota</h1>
        <sub>Daftar anggota koperasi</sub>
    </div>
    <div class="col-2">
        <a href="../index.php" class="btn btn-light shadow-sm float-end text-primary "><i class="bi bi-house"></i> Home</a>
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
            <td>Action</td>
        </tr>

        <?php foreach ($list as $key => $anggota) : ?>
            <tr>
                <td><?= $key + 1; ?></td>
                <td><?= $anggota->nama; ?></td>
                <td><?= $anggota->email; ?></td>
                <td><?= $anggota->alamat; ?></td>
                <td><?= $anggota->telp; ?></td>
                <td><?= tipeAnggotaORM::getNama($anggota->tipe_id); ?></td>
                <td>
                    <a href="<?= BASE_PATH; ?>?page=anggota/form&id=<?= $anggota->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                    <a href="<?= BASE_PATH; ?>?page=anggota/delete&id=<?= $anggota->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>