<?php

require_once('../orm/anggotaORM.php');
require_once('../orm/tipeAnggotaORM.php');

$list = anggotaORM::findMany();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <title>Contoh form dengan php</title>
</head>


<body>
    <div class="container">

        <!-- Jika ada parameter msg yang didapat dari hasil penyimpanan data atau update data maka tampilkan pesan -->
        <?php if (isset($_GET['msg'])) : ?>

            <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
                <?= $_GET['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php endif; ?>

        <div class="row  mt-4">
            <div class="col-10">
                <h1>List Anggota</h1>
                <sub>Daftar anggota koperasi</sub>
            </div>
            <div class="col-2">
                <a href="../index.php" class="btn btn-light shadow-sm float-end text-primary "><i class="bi bi-house"></i> Home</a>
            </div>

        </div>

        <div class="row align-items-center mt-4">

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
                            <a href="../anggota/form.php?id=<?= $anggota->id; ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="../anggota/delete.php?id=<?= $anggota->id; ?>" class="btn btn-sm btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </table>



        </div>


    </div>

</body>

</html>