<?php

use App\Core\Session;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
    <link rel="stylesheet" type="text/css" href="<?= get_template_path(); ?>assets/css/general.css">
    <title><?= (isset($title)) ? $title : ''; ?></title>

    <script>
        //enable tooltip
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
</head>


<div class="container">

    <div class="row my-3">
        <div class="col-12 text-start">
            <img src="<?= base_url(); ?>images/logo.png" class="d-block" height="130px">
        </div>

    </div>

    <div class="row">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= site_url(); ?>"> <i class="bi bi-house"></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= site_url(); ?>">Dashboard</a>
                        </li>
                        <li class="nav-item dropdown px-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Anggota
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="<?= site_url(); ?>anggota/form" class="dropdown-item"> Tambah </a></li>
                                <li><a href="<?= site_url(); ?>anggota/list" class="dropdown-item"> Daftar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown px-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Simpanan
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="<?= site_url(); ?>simpanan" class="dropdown-item"> Tambah </a></li>
                                <li><a href="<?= site_url(); ?>simpanan/list.php" class="dropdown-item"> Daftar</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown px-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pinjaman
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="pinjaman/form.php" class="dropdown-item"> Tambah </a></li>
                                <li><a href="pinjaman/list.php" class="dropdown-item"> Daftar</a></li>
                            </ul>
                        </li>
                    </ul>
                    <span class="h6 shadow-sm bg-white rounded-pill text-dark p-2 mb-0 border px-3"> Hello <?= session::get('username'); ?> 😊</span>
                </div>
            </div>
        </nav>
    </div>

    <?php echo bread_crumb(); ?>


    <!-- Jika ada parameter msg yang didapat dari hasil penyimpanan data atau update data maka tampilkan pesan -->
    <?php Session::showFlashMessage() ?>