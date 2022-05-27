<?php

$id = (isset($_GET['id'])) ? $_GET['id'] : 0;

$anggota = anggotaORM::findOne($id);

$tipe_list = tipeAnggotaORM::findMany();

?>

<div class="row  mt-4">
    <div class="col-6">
        <h2>Form Identitas Anggota</h2>
        <small class="text-muted">Isikan identitas anggota anda</small>
    </div>

</div>

<div class="row align-items-center mt-4">

    <form action="../anggota/simpan.php" method="POST">

        <div class="mb-3 mt-4">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama" value="<?= ($id) ? $anggota->nama : ''; ?>">
        </div>
        <div class="mb-3">
            <label for="alamat">alamat</label>
            <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?= ($id) ? $anggota->alamat : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="telp">Nomor Telp</label>
            <input type="text" name="telp" class="form-control" placeholder="Telp" value="<?= ($id) ? $anggota->telp : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?= ($id) ? $anggota->email : ''; ?>">
        </div>


        <div class="mb-3">
            <label for="email">Tipe Anggota</label>
            <select class="form-control" name="tipe_id">
                <?php foreach ($tipe_list as $tipe) : ?>
                    <option value="<?= $tipe->id; ?>" <?= ($id && $anggota->tipe_id == $tipe->id) ? 'selected' : ''; ?>><?= $tipe->nama; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="hidden" name="id" value="<?= ($id) ? $anggota->id : ''; ?>" />

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>